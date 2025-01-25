<?php
//Autor: Troya Garzón Geancarlos 
require_once __DIR__ . '/../model/dao/LogisticaDAO.php';
require_once __DIR__ . '/../model/dto/LogisticaDTO.php';

class Editar_intercambioController {

    public function index() {
        // Aquí debes cargar el registro a editar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Aquí debes obtener el intercambio con el ID correspondiente de la base de datos
            // Usamos LogisticaDAO para obtener el intercambio
            $dao = new LogisticaDAO();
            $intercambio = $dao->getIntercambioById($id);
            
            // Verificar si se encuentra el intercambio
            if ($intercambio) {
                require_once SUB_HEADER;
                require_once 'view/HTML/Logistica/editar_intercambio.php';
                require_once FOOTER;
            } else {
                echo "Intercambio no encontrado";
            }
        } else {
            echo "ID no proporcionado";
        }
    }

    public function editar() {
        if ($_SESSION["rol"] != 'admin') {
            // Si el usuario no es admin, redirigirlo
            header('Location: ' . URL_BASE . 'index.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $id = $_POST['id']; 
            $usuario_id = $_POST['usuario_id'];
            $fechaintercambio = $_POST['fechaintercambio'];
            $fecharegistro = $_POST['fecharegistro'];
            $ubicacion = $_POST['ubicacion'];
            $calificacion = $_POST['calificacion'];
            $estado = $_POST['estado'];
            $metodo = $_POST['metodo'];

            // Validaciones del lado del servidor
            $errores = [];

            // 1. Verificar que los campos obligatorios no estén vacíos
            if (empty($fechaintercambio)) {
                $errores['fechaintercambio'] = 'La fecha de intercambio es obligatoria';
            }
            if (empty($fecharegistro)) {
                $errores['fecharegistro'] = 'La fecha de registro es obligatoria';
            }
            if (empty($ubicacion)) {
                $errores['ubicacion'] = 'La ubicación es obligatoria';
            }
            if (empty($calificacion) || $calificacion < 1 || $calificacion > 10) {
                $errores['calificacion'] = 'La calificación debe estar entre 1 y 10';
            }
            if (empty($estado)) {
                $errores['estado'] = 'Debe seleccionar un estado';
            }
            if (empty($metodo)) {
                $errores['metodo'] = 'Debe seleccionar un método de entrega';
            }

            // Si existen errores, guardarlos en la sesión y redirigir de nuevo
            if (count($errores) > 0) {
                $_SESSION['errores'] = $errores;
                header("Location: index.php?c=editar_intercambio&f=index&id=$id");
                exit();
            }

            // Si las validaciones son correctas, crear el objeto LogisticaDTO
            $intercambio = new LogisticaDTO();
            $intercambio->setId($id);
            $intercambio->setUsuarioId($usuario_id);
            $intercambio->setFechaintercambio($fechaintercambio);
            $intercambio->setFecharegistro($fecharegistro);
            $intercambio->setUbicacion($ubicacion);
            $intercambio->setCalificacion($calificacion);
            $intercambio->setEstado($estado);
            $intercambio->setMetodo($metodo);

            // Llamar al DAO para actualizar el intercambio
            $dao = new LogisticaDAO();
            $resultado = $dao->update($intercambio);

            if ($resultado) {
                // Si la actualización fue exitosa, redirigir
                header("Location: index.php?c=Intercambio_info&f=index");
                exit(); // Salir del script después de redirigir
            } else {
                // Si ocurrió un error en la actualización
                echo "Error al actualizar el intercambio.";
            }
        }
    }
}
?>
