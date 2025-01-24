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

    // Método para buscar intercambios con filtros
    public function buscarIntercambios($query, $filtros) {
        try {
            // Construir la consulta base
            $sql = "SELECT * FROM intercambios WHERE 1=1";

            // Añadir filtros a la consulta
            if (!empty($query)) {
                $sql .= " AND (fechaintercambio LIKE :query OR metodo LIKE :query OR ubicacion LIKE :query)";
            }
            if ($filtros['fecha']) {
                $sql .= " AND fechaintercambio IS NOT NULL";
            }
            if ($filtros['metodo']) {
                $sql .= " AND metodo IS NOT NULL";
            }
            if ($filtros['id']) {
                $sql .= " AND id > 0";
            }

            $stmt = $this->conn->prepare($sql);

            // Enlazar parámetros
            if (!empty($query)) {
                $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
            }

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            error_log("Error en la búsqueda de intercambios: " . $e->getMessage());
            return [];
        }
    }


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
}
// aqui va el metodo eliminar
?>
