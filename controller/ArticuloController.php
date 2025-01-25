<!-- Autor: Marco Antonio Salazar Mejia-->
<?php
require_once 'model/dao/ArticuloDAO.php';
require_once 'model/dto/ArticuloDTO.php';
require_once 'model/dao/CategoriaDAO.php';
require_once 'model/dto/CategoriaDTO.php';

class ArticuloController
{
    private $ArticuloDAO;
    public function __construct()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
        $this->ArticuloDAO = new ArticuloDAO();
    }
    public function index()
    {
        $articulos = $this->ArticuloDAO->selectAll();
        $nombresCategoria = [];
        $categoriaDAO = new CategoriaDAO();

        foreach ($articulos as $articulo) {
            $cat_id = $articulo->cat_id;
            $categoria = $categoriaDAO->selectOne($cat_id);
            $nombreCat = $categoria["cat_nombre"];
            $nombresCategoria[] = $nombreCat;
        }

        // Pasar la lista de artículos con categoría a la vista
        require_once SUB_HEADER;
        require_once LARTICULO;
        require_once FOOTER;
    }
    public function view_new()
    {
        $categoriaDAO = new CategoriaDAO();
        $categorias = $categoriaDAO->selectAll();
        require_once SUB_HEADER;
        require_once NEWARTICULO;
        require_once FOOTER;
    }

    public function save()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            header('Location: ' . URL_BASE . 'index.php');
        }
        if (
            (empty($_POST["titulo"])) || (empty($_POST["introduccion"])) || (empty($_POST["descripcion"])) ||
            (empty($_POST["conclusion"])) || (empty($_POST["categoria"])) || (empty($_FILES["portada"])) ||
            (empty($_POST["autores"])) || (empty($_POST["referencias"]))
        ) {
            header('Location: ' . URL_BASE . 'index.php');
        }

        try {
            $article = $this->populate();
            $exito = $this->ArticuloDAO->insert($article);
            if ($exito) {
                $_SESSION['mensaje'] = "El articulo se ha publicado exitosamente";
                $_SESSION['tipo'] = "success";
                header('Location: ' . URL_BASE . 'index.php?c=articulo&f=index');
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el articulo";
                $_SESSION['tipo'] = "error";
                header('Location: ' . URL_BASE . 'index.php?c=articulo&f=view_new');
            }
        } catch (Exception $e) {
            $_SESSION['mensaje'] = "Error al actualizar el articulo";
            $_SESSION['tipo'] = "error";
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }

    }

    public function populate()
    {
        //lectura de parametros
        $article = new ArticuloDTO();
        $article->setId(htmlentities($_POST["id"] ?? null));
        $article->setTitulo(htmlentities($_POST["titulo"]));
        $article->setIntroduccion(htmlentities($_POST["introduccion"]));
        $article->setDescripcion(htmlentities($_POST["descripcion"]));
        $article->setConclusion(htmlentities($_POST["conclusion"]));
        $article->setCategoriaId(htmlentities($_POST["categoria"]));
        //$estado= isset($_POST["estado"])?1:0;
        $article->setEstado(1);
        // Manejo de la imagen
        if (isset($_FILES['portada']) && $_FILES['portada']['error'] == 0) {
            $imagen = $this->procesarImagen($_FILES['portada']);
            if ($imagen) {
                $article->setImagen($imagen);
            }
        } else {
            // Si no se ha subido una nueva imagen, mantener la imagen existente
            $article->setImagen(htmlentities($_POST["imagen_actual"]));
        }
        $article->setUsuarioId($_SESSION['usuario_id']);
        $fecha = new DateTime('NOW');
        $article->setFechaRegistro($fecha->format('Y-m-d H:i:s'));
        $article->setReferencias(htmlentities($_POST["referencias"]));
        $article->setAutores(htmlentities($_POST["autores"]));

        return $article;
    }

    private function procesarImagen($file)
    {
        // Validar el tipo de archivo
        $permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($file['type'], $permitidos)) {
            throw new Exception("Tipo de archivo no permitido");
        }

        // Validar tamaño (5MB máximo)
        if ($file['size'] > 5 * 1024 * 1024) {
            throw new Exception("El archivo es demasiado grande");
        }

        $targetDir = "assets/CSS/Image/portadasArticulos/";

        // Crear el directorio si no existe
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Generar nombre único para el archivo
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '_' . date('Ymd_His') . '.' . $extension;
        $targetFile = $targetDir . $fileName;

        // Mover el archivo
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $targetFile;
        }

        return null;
    }

    public function details()
    {
        $id = htmlentities($_GET['id']);
        $article = $this->ArticuloDAO->selectOne($id);
        $categoriaDAO = new CategoriaDAO();
        $categoria = $categoriaDAO->selectOne($article["cat_id"]);
        require_once SUB_HEADER;
        require_once VIEWARTICULO;
        require_once FOOTER;
    }

    public function view_edit()
    {
        $id = htmlentities($_GET['id']);
        $article = $this->ArticuloDAO->selectOne($id);
        $user = $article["art_usuarioId"];
        $categoriaDAO = new CategoriaDAO();
        $categoria = $categoriaDAO->selectOne($article["cat_id"]);
        $categorias = $categoriaDAO->selectAll();
        if ($_SESSION['usuario_id'] != $user) {
            header('Location: ' . URL_BASE . 'index.php');
        }
        require_once SUB_HEADER;
        require_once EDITARTICULO;
        require_once FOOTER;
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            header('Location: ' . URL_BASE . 'index.php');
        }
        if (
            (empty($_POST["titulo"])) || (empty($_POST["introduccion"])) || (empty($_POST["descripcion"])) ||
            (empty($_POST["conclusion"])) || (empty($_POST["categoria"])) || (empty($_FILES["portada"])) ||
            (empty($_POST["autores"])) || (empty($_POST["referencias"]))
        ) {
            header('Location: ' . URL_BASE . 'index.php');
        }
        try {
            $article = $this->populate();
            $exito = $this->ArticuloDAO->update($article);
            if ($exito) {
                $_SESSION['mensaje'] = "El articulo se ha actualizado exitosamente";
                $_SESSION['tipo'] = "success";
                header('Location: ' . URL_BASE . 'index.php?c=articulo&f=index');
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el articulo";
                $_SESSION['tipo'] = "error";
                header('Location: ' . URL_BASE . 'index.php?c=articulo&f=details');
            }
        } catch (Exception $e) {
            $_SESSION['mensaje'] = "Error al actualizar el articulo";
            $_SESSION['tipo'] = "error";
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
    }

    public function delete()
    {
        $id = htmlentities($_GET['id']);
        $article = $this->ArticuloDAO->selectOne($id);
        $user = $article["art_usuarioId"];
        if ($_SESSION["rol"] != 'admin' || $_SESSION['usuario_id'] != $user) {
            header('Location: ' . URL_BASE . 'index.php');
        }
        try {
            if ($this->ArticuloDAO->logicalDelete($id)) {
                $_SESSION['mensaje'] = "El articulo se ha eliminado exitosamente";
                $_SESSION['tipo'] = "success";
                header('Location: ' . URL_BASE . 'index.php?c=articulo&f=index');
            } else {
                $_SESSION['mensaje'] = "Error al eliminar el articulo";
                $_SESSION['tipo'] = "error";
                header('Location: ' . URL_BASE . 'index.php?c=articulo&f=details');
            }
            header('Location: ' . URL_BASE . 'index.php?c=admin&f=libros');
            exit;
        } catch (Exception $e) {
            $_SESSION['mensaje'] = "Error al eliminar el articulo";
            $_SESSION['tipo'] = "error";
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
    }


    public function search(){
        //recibe parametros de la peticion
        $parametro = htmlentities($_POST["b"]??"");
        //comunicarme con el modelo
        $articulos = $this->ArticuloDAO->selectName($parametro);
        //comunicamos con la vista
        require_once SUB_HEADER;
        require_once LARTICULO;        
        require_once FOOTER;
    }
}

?>