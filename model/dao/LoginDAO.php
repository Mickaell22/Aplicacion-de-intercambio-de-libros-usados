<!-- Autor: Moran Vera Mickaell -->

<?php
require_once __DIR__ . '/../dto/UsuarioDTO.php';

class LoginDAO {
    private $conn;

    public function __construct() {
        try {
            require_once __DIR__ . '/../../config/Database.php';
            $database = new Database();
            $this->conn = $database->getConnection();
            
            if (!$this->conn) {
                throw new Exception("No se pudo establecer la conexión con la base de datos");
            }
        } catch (Exception $e) {
            error_log("Error en LoginDAO constructor: " . $e->getMessage());
            throw $e;
        }
    }

    public function validarUsuario($email, $password) {
        try {
            if (!$this->conn) {
                throw new Exception("No hay conexión a la base de datos");
            }

            $sql = "SELECT * FROM Usuarios 
                    WHERE correo_electronico = :email 
                    AND contrasena = :password 
                    LIMIT 1";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new UsuarioDTO();
                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setApellido($row['apellido']);
                $usuario->setNombreUsuario($row['nombre_usuario']);
                $usuario->setCorreoElectronico($row['correo_electronico']);
                $usuario->setPais($row['pais']);
                $usuario->setUbicacion($row['ubicacion']);
                $usuario->setRol($row['rol']);
                
                return $usuario;
            }
            
            return null;
        } catch(PDOException $e) {
            error_log("Error en validarUsuario: " . $e->getMessage());
            throw $e;
        }
    }
}
?>