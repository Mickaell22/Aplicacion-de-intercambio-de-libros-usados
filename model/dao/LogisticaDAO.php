<!-- Autor: Troya Garzon Geancarlos -->
<?php

class LogisticaDAO 
{
    private $conn;

    public function __construct()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $this->conn = (new Database())->getConnection();
    }
    public function insert($intercambio)
{
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



?>