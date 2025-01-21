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
            $sql = "SELECT * FROM usuarios WHERE correo_electronico = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($usuario && password_verify($password, $usuario['contrasena'])) {
                $usuarioDTO = new UsuarioDTO();
                $usuarioDTO->setId($usuario['id']);
                $usuarioDTO->setNombre($usuario['nombre']);
                $usuarioDTO->setApellido($usuario['apellido']);
                $usuarioDTO->setNombreUsuario($usuario['nombre_usuario']);
                $usuarioDTO->setCorreoElectronico($usuario['correo_electronico']);
                $usuarioDTO->setPais($usuario['pais']);
                $usuarioDTO->setUbicacion($usuario['ubicacion']);
                $usuarioDTO->setRol($usuario['rol']);
                
                return $usuarioDTO;
            }
            return null;

        } catch (PDOException $e) {
            error_log("Error en validarUsuario: " . $e->getMessage());
            throw $e;
        }
    }
}
?>