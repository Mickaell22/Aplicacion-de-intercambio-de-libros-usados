<?php
class UsuarioDAO {
    private $conn;

    public function __construct() {
        require_once __DIR__ . '/../../config/Database.php';
        $this->conn = (new Database())->getConnection();
    }

    public function insert($usuario) {
        try {
            $sql = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, 
                    numero_celular, pais, ubicacion, fecha_nacimiento, 
                    genero, correo_electronico, contrasena, rol) 
                    VALUES (:nombre, :apellido, :nombre_usuario, 
                    :numero_celular, :pais, :ubicacion, :fecha_nacimiento, 
                    :genero, :correo_electronico, :contrasena, :rol)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
            $stmt->bindParam(":nombre_usuario", $usuario->getNombreUsuario(), PDO::PARAM_STR);
            $stmt->bindParam(":numero_celular", $usuario->getNumeroCelular(), PDO::PARAM_STR);
            $stmt->bindParam(":pais", $usuario->getPais(), PDO::PARAM_STR);
            $stmt->bindParam(":ubicacion", $usuario->getUbicacion(), PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $usuario->getFechaNacimiento(), PDO::PARAM_STR);
            $stmt->bindParam(":genero", $usuario->getGenero(), PDO::PARAM_STR);
            $stmt->bindParam(":correo_electronico", $usuario->getCorreoElectronico(), PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $usuario->getContrasena(), PDO::PARAM_STR);
            $stmt->bindParam(":rol", $usuario->getRol(), PDO::PARAM_STR);

            $res = $stmt->execute();
            return $res;

        } catch (PDOException $e) {
            error_log("Error en insert de UsuarioDAO: " . $e->getMessage());
            return false;
        }
    }

    public function correoExiste($correo) {
        try {
            $sql = "SELECT COUNT(*) FROM usuarios WHERE correo_electronico = :correo";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Error en correoExiste: " . $e->getMessage());
            return false;
        }
    }

    public function getUsuarioById($id) {
        try {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getUsuarioById: " . $e->getMessage());
            return null;
        }
    }
}
?>