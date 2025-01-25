<!-- Autor: Marco Antonio Salazar Mejia-->
<?php
require_once 'model/dao/CategoriaDAO.php';
require_once 'model/dto/CategoriaDTO.php';

class CategoriaController{
    public $categoriaDAO;
    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function index()
    {
        if($_SESSION["rol"] != 'admin'){
            header('Location: ' . URL_BASE . 'index.php');
        }
        //comunicamos con modelo
        $resultados = $this->categoriaDAO->selectAll();
        //comunicamos con la vista
        //$titulo = "Lista de categorias";
        require_once SUB_HEADER;
        require_once LCATEGORIA;
        require_once FOOTER;
    }

    public function view_new(){
        if($_SESSION["rol"] != 'admin'){
            header('Location: ' . URL_BASE . 'index.php');
        }
        //comunicacion con la vista
        require_once SUB_HEADER;
        require_once NEWCATEGORIA;
        require_once FOOTER;
    }

    public function save(){
        if($_SESSION["rol"] != 'admin'){
            header('Location: ' . URL_BASE . 'index.php');
        }
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header('Location: ' . URL_BASE . 'index.php');
        }
        if((empty($_POST["nombre"]))||(empty($_POST["descripcion"]))||
        (empty($_POST["estado"]))){
            header('Location: ' . URL_BASE . 'index.php');
        }
        $category = $this->populate();
        $exito = $this->categoriaDAO->insert($category);
        $this->redirectTwithMessage($exito, "categoria insertada correctamente"
        , "No se pudo realizar la insercion", "index.php?c=categoria&f=index");
    }

    public function populate(){
        //lectura de parametros
        $category = new CategoriaDTO();
        $category->setId(htmlentities($_POST["id"]??null));
        $category->setNombre(htmlentities($_POST["nombre"]));
        $category->setDescripcion(htmlentities($_POST["descripcion"]));
        $estado= isset($_POST["estado"])?1:0;
        $category->setEstado($estado);
        return $category;
    }

    public function redirectTwithMessage($exito, $exitoMsg, $errMsg, $redirectUrl){
        if(!isset($_SESSION)) session_start();
        $_SESSION['mensaje'] = ($exito)?$exitoMsg:$errMsg;
        $_SESSION['color'] = ($exito)?'primary':'danger';
        //si hago echo no puedo redireccionar
        header("Location: $redirectUrl");
    }

    public function edit_view(){
        if($_SESSION["rol"] != 'admin'){
            header('Location: ' . URL_BASE . 'index.php');
        }
        //leer los parametros enviados en la peticion
        $id = htmlentities($_GET['id']);
        $category = $this->categoriaDAO->selectOne($id);
        if($category==null){
            $_SESSION["mensaje"] = "No se encontro la categoria a editar";
            $_SESSION["color"] = "danger";
            header("Location: index.php?c=categoria&f=index");
        }
        //comunicacion con la vista
        require_once SUB_HEADER;
        require_once EDITCATEGORIA;
        require_once FOOTER;
    }

    public function edit(){
        if($_SESSION["rol"] != 'admin'){
            header('Location: ' . URL_BASE . 'index.php');
        }
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            header('Location: ' . URL_BASE . 'index.php');
        }
        if((empty($_POST["nombre"]))||(empty($_POST["descripcion"]))||
        !isset($_POST["estado"])){
            header('Location: ' . URL_BASE . 'index.php');
        }
        $cat = $this->populate();
        $exito = $this->categoriaDAO->update($cat);
        $this->redirectTwithMessage($exito, "categoria actualizado correctamente"
        , "No se pudo realizar la actualizacion", "index.php?c=categoria&f=index");
    }

    
    public function search()
    {
        if($_SESSION["rol"] != 'admin'){
            header('Location: ' . URL_BASE . 'index.php');
        }
        //recibe parametros de la peticion
        $parametro = htmlentities($_POST["b"]??"");
        //comunicarme con el modelo
        $resultados = $this->categoriaDAO->selectName($parametro);
        //comunicamos con la vista
        require_once SUB_HEADER;
        require_once LCATEGORIA;
        require_once FOOTER;
    }

    //delete
    public function delete(){
        if($_SESSION["rol"] != 'admin'){
            header('Location: ' . URL_BASE . 'index.php');
        }
        //leer el paramentro del id
        $id = htmlentities($_GET["id"]??"");
        //comunicamos con modelo
        $exito = $this->categoriaDAO->logicalDelete($id);
        
        $this->redirectTwithMessage($exito, "categoria eliminado correctamente"
        , "No se pudo realizar la eliminacion", "index.php?c=categoria&f=index");
    }

}
?>