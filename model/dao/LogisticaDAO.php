<?php

class LogisticaDAO {
    private $conn;

    public function __construct() {
        require_once __DIR__ . '/../../config/Database.php';
        $this->conn = (new Database())->getConnection();
    }

    public function insert($intercambio) {
        try {
            // Verificar los valores que llegan al DAO
            error_log("Datos en DAO: " . print_r($intercambio, true)); // Verificar el objeto intercambios
            
            $sql = "INSERT INTO intercambios (fechaintercambio, fecharegistro, usuario_id, ubicacion, calificacion, estado, metodo) 
                    VALUES (:fechaintercambio, :fecharegistro, :usuario_id, :ubicacion, :calificacion, :estado, :metodo)";
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(":fechaintercambio", $intercambio->getFechaintercambio(), PDO::PARAM_STR);
            $stmt->bindParam(":fecharegistro", $intercambio->getFecharegistro(), PDO::PARAM_STR);
            $stmt->bindParam(":usuario_id", $intercambio->getUsuarioId(), PDO::PARAM_INT);
            $stmt->bindParam(":ubicacion", $intercambio->getUbicacion(), PDO::PARAM_STR);
            $stmt->bindParam(":calificacion", $intercambio->getCalificacion(), PDO::PARAM_INT);
            $stmt->bindParam(":estado", $intercambio->getEstado(), PDO::PARAM_STR);
            $stmt->bindParam(":metodo", $intercambio->getMetodo(), PDO::PARAM_STR);

            $res = $stmt->execute();
            return $res;

        } catch (PDOException $e) {
            error_log("Error en insert de LogisticaDAO: " . $e->getMessage());
            return false;
        }
    }

    //buscar


    public function update($intercambio) {
        try {
            // Verificar los valores que llegan al DAO
            error_log("Datos en DAO (actualización): " . print_r($intercambio, true));

            $sql = "UPDATE intercambios 
                    SET fechaintercambio = :fechaintercambio, 
                        fecharegistro = :fecharegistro, 
                        ubicacion = :ubicacion, 
                        calificacion = :calificacion, 
                        estado = :estado, 
                        metodo = :metodo 
                    WHERE id = :id";
            
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(":id", $intercambio->getId(), PDO::PARAM_INT); // Asegurarse de que se actualice el intercambio correcto
            $stmt->bindParam(":fechaintercambio", $intercambio->getFechaintercambio(), PDO::PARAM_STR);
            $stmt->bindParam(":fecharegistro", $intercambio->getFecharegistro(), PDO::PARAM_STR);
            $stmt->bindParam(":ubicacion", $intercambio->getUbicacion(), PDO::PARAM_STR);
            $stmt->bindParam(":calificacion", $intercambio->getCalificacion(), PDO::PARAM_INT);
            $stmt->bindParam(":estado", $intercambio->getEstado(), PDO::PARAM_STR);
            $stmt->bindParam(":metodo", $intercambio->getMetodo(), PDO::PARAM_STR);

            $res = $stmt->execute();
            return $res;

        } catch (PDOException $e) {
            error_log("Error en update de LogisticaDAO: " . $e->getMessage());
            return false;
        }
    }
    public function getIntercambioById($id) {
        try {
            $sql = "SELECT * FROM intercambios WHERE id = :id";  // Asegúrate de que 'id' sea el nombre de la columna en la base de datos
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un solo registro, como un array asociativo
    
            return $result; // Retorna el intercambio encontrado
        } catch (PDOException $e) {
            error_log("Error al obtener intercambio por ID: " . $e->getMessage());
            return null;  // Retorna null en caso de error
        }
    }

    public function selectOne($id) {
        $sql = "select * from intercambios where id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        //recuperacion de resultados
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function getAllIntercambios() {
        try {
            $sql = "SELECT * FROM intercambios"; // Consulta para obtener todos los intercambios
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados como un array asociativo

            return $result; // Retornar los resultados
        } catch (PDOException $e) {
            error_log("Error al obtener intercambios: " . $e->getMessage());
            return [];
        }
    }
   
    public function delete($id) {
        try {
            $sql = "DELETE FROM intercambios WHERE id = :id";  // Asegúrate de que 'id' es el nombre correcto de la columna
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $res = $stmt->execute();
    
            return $res;  // Retorna true si se eliminó correctamente, false si hubo un error
        } catch (PDOException $e) {
            error_log("Error al eliminar intercambio: " . $e->getMessage());
            return false;  // Retorna false si ocurrió un error
        }
    }



}

?>
