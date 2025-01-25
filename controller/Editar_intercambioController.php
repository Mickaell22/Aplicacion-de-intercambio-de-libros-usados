<?php
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $id = $_POST['id']; // Asegúrate de que el campo 'id' esté incluido en el formulario
            $usuario_id = $_POST['usuario_id'];
            $fechaintercambio = $_POST['fechaintercambio'];
            $fecharegistro = $_POST['fecharegistro'];
            $ubicacion = $_POST['ubicacion'];
            $calificacion = $_POST['calificacion'];
            $estado = $_POST['estado'];
            $metodo = $_POST['metodo'];
    
            // Crear un objeto intercambio
            $intercambio = new LogisticaDTO();
            $intercambio->setId($id); // Configurar el ID del objeto
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
                // Redirigir o mostrar un mensaje de éxito
                header("Location: index.php?c=Intercambio_info&f=index");
            } else {
                echo "Error al actualizar el intercambio";
            }
        }
    }
    
    
}

?>
