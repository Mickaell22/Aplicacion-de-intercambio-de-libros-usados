<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../dto/UsuarioDTO.php';

class LoginDAO {
    private $conn;
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    private function conectar() {
        try {
            $this->conn = $this->database->getConnection();
        } catch (Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function validarUsuario($email, $password) {
        try {
            $this->conectar();
            
            $sql = "SELECT * FROM Usuarios 
                    WHERE correo_electronico = :email 
                    AND contrasena = :password 
                    LIMIT 1";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $usuario = new UsuarioDTO();
                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setApellido($row['apellido']);
                $usuario->setNombreUsuario($row['nombre_usuario']);
                $usuario->setNumeroCelular($row['numero_celular']);
                $usuario->setPais($row['pais']);
                $usuario->setUbicacion($row['ubicacion']);
                $usuario->setFechaNacimiento($row['fecha_nacimiento']);
                $usuario->setGenero($row['genero']);
                $usuario->setCorreoElectronico($row['correo_electronico']);
                return $usuario;
            }
            return null;
        } catch(PDOException $e) {
            error_log("Error en validarUsuario: " . $e->getMessage());
            return null;
        } finally {
            $this->conn = null;
        }
    }
}
?>