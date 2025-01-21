<?php
class DenunciaDAO
{
    private $conn;

    public function __construct()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function crearDenuncia($denuncia)
    {
        try {
            $sql = "INSERT INTO denuncias (libro_id, usuario_id, tipo, descripcion, 
                    evidencia, fecha_incidente, estado) 
                    VALUES (:libro_id, :usuario_id, :tipo, :descripcion, 
                    :evidencia, :fecha_incidente, 'pendiente')";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":libro_id", $denuncia->getLibroId(), PDO::PARAM_INT);
            $stmt->bindParam(":usuario_id", $denuncia->getUsuarioId(), PDO::PARAM_INT);
            $stmt->bindParam(":tipo", $denuncia->getTipo(), PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $denuncia->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindParam(":evidencia", $denuncia->getEvidencia(), PDO::PARAM_STR);
            $stmt->bindParam(":fecha_incidente", $denuncia->getFechaIncidente(), PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en crearDenuncia: " . $e->getMessage());
            return false;
        }
    }

    public function getAllDenuncias()
    {
        try {
            $sql = "SELECT d.*, l.titulo as libro_titulo, u.nombre as usuario_nombre 
                    FROM denuncias d 
                    INNER JOIN libros l ON d.libro_id = l.id 
                    INNER JOIN usuarios u ON d.usuario_id = u.id 
                    ORDER BY d.fecha_registro DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getAllDenuncias: " . $e->getMessage());
            return [];
        }
    }

    public function getDenunciaDetalle($id) {
        try {
            $sql = "SELECT d.*, 
                    l.titulo as libro_titulo,
                    l.autor as libro_autor,
                    l.imagen as imagen_libro,
                    u.nombre as usuario_nombre,
                    u.correo_electronico as usuario_email 
                    FROM denuncias d 
                    INNER JOIN libros l ON d.libro_id = l.id 
                    INNER JOIN usuarios u ON d.usuario_id = u.id 
                    WHERE d.id = :id";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Fetch para obtener una única denuncia
            return $stmt->fetch(PDO::FETCH_ASSOC);
    
        } catch(PDOException $e) {
            error_log("Error en getDenunciaDetalle: " . $e->getMessage());
            return null;
        }
    }

    public function actualizarDenuncia($id, $datos) {
        try {
            $sql = "UPDATE denuncias 
                    SET tipo = :tipo,
                        estado = :estado,
                        fecha_incidente = :fecha_incidente,
                        descripcion = :descripcion
                    WHERE id = :id";
                    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
            $stmt->bindParam(':estado', $datos['estado'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha_incidente', $datos['fecha_incidente'], PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
            
        } catch(PDOException $e) {
            error_log("Error en actualizarDenuncia: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarDenuncia($id) {
        try {
            // Primero, verificamos si la denuncia existe
            $checkSql = "SELECT id FROM denuncias WHERE id = :id";
            $checkStmt = $this->conn->prepare($checkSql);
            $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $checkStmt->execute();
            
            if ($checkStmt->rowCount() === 0) {
                // La denuncia no existe
                return false;
            }
    
            // Si existe, procedemos a eliminarla
            $sql = "DELETE FROM denuncias WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
    
        } catch(PDOException $e) {
            error_log("Error en eliminarDenuncia: " . $e->getMessage());
            return false;
        }
    }

    public function cambiarEstado($id, $estado) {
        try {
            $sql = "UPDATE denuncias SET estado = :estado 
                    WHERE id = :id";
                    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
            
        } catch(PDOException $e) {
            error_log("Error en cambiarEstado: " . $e->getMessage());
            return false;
        }
    }

}
?>