<!-- Autor: Moran Vera Mickaell -->

<?php
require_once 'config.php';

class database {
    public function getConnection() {
        try {
            $conn = new PDO(
                "mysql:host=" . HOST . ";dbname=" . DBNAME,
                DBUSER,
                DBPASSWORD
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");
            return $conn;
        } catch(PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage());
            throw $e;
        }
    }
}
?>