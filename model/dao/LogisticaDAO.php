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
 <!-- Hacerlo adaptado a mi bd -->
 public function insert($intercambio)
 {
     try {
         $sql = "INSERT INTO intercambios (fechaintercambio, fecharegistro, usuario, ubicacion, calificacion, estado, metodo) 
                 VALUES (:fechaintercambio, :fecharegistro, :usuario, :ubicacion, :calificacion, :estado, :metodo)";
 
         $stmt = $this->conn->prepare($sql);
 
         // Vincula los parámetros con los valores del objeto $intercambio
         $stmt->bindParam(":fechaintercambio", $intercambio->getFechaintercambio(), PDO::PARAM_STR);
         $stmt->bindParam(":fecharegistro", $intercambio->getFecharegistro(), PDO::PARAM_STR);
         $stmt->bindParam(":usuario", $intercambio->getUsuario(), PDO::PARAM_STR);
         $stmt->bindParam(":ubicacion", $intercambio->getUbicacion(), PDO::PARAM_STR);
         $stmt->bindParam(":calificacion", $intercambio->getCalificacion(), PDO::PARAM_INT);
         $stmt->bindParam(":estado", $intercambio->getEstado(), PDO::PARAM_STR);
         $stmt->bindParam(":metodo", $intercambio->getMetodo(), PDO::PARAM_STR);
 
         // Ejecuta la consulta
         $res = $stmt->execute();
         return $res;
 
     } catch (PDOException $e) {
         // Captura el error y lo registra
         error_log("Error en insert de IntercambioDAO: " . $e->getMessage());
         return false;
     }
 }


}

?>