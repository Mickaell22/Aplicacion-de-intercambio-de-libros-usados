<!-- Autor: Moran Vera Mickaell -->

<?php
class LibroDAO
{
    private $conn;

    public function __construct()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $this->conn = (new Database())->getConnection();
    }

    public function insert($libro)
    {
        try {
            $sql = "INSERT INTO libros (titulo, autor, genero, anio, editorial, descripcion, 
                    imagen, estado, usuario_id, fecha_registro) 
                    VALUES (:titulo, :autor, :genero, :anio, :editorial, :descripcion, 
                    :imagen, :estado, :usuario_id, :fecha_registro)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":titulo", $libro->getTitulo(), PDO::PARAM_STR);
            $stmt->bindParam(":autor", $libro->getAutor(), PDO::PARAM_STR);
            $stmt->bindParam(":genero", $libro->getGenero(), PDO::PARAM_STR);
            $stmt->bindParam(":anio", $libro->getAnio(), PDO::PARAM_INT);
            $stmt->bindParam(":editorial", $libro->getEditorial(), PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $libro->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $libro->getImagen(), PDO::PARAM_STR);
            $stmt->bindParam(":estado", $libro->getEstado(), PDO::PARAM_STR);
            $stmt->bindParam(":usuario_id", $libro->getUsuarioId(), PDO::PARAM_INT);
            $stmt->bindParam(":fecha_registro", $libro->getFechaRegistro(), PDO::PARAM_STR);

            $res = $stmt->execute();
            return $res;

        } catch (PDOException $e) {
            error_log("Error en insert de LibroDAO: " . $e->getMessage());
            return false;
        }
    }

    public function getAllLibros($mostrarPendientes = false)
    {
        try {
            $sql = "SELECT l.*, u.nombre as nombre_usuario 
                    FROM libros l 
                    INNER JOIN usuarios u ON l.usuario_id = u.id";

            if ($mostrarPendientes) {
                // Mostrar solo pendientes y rechazados
                $sql .= " WHERE l.estado IN ('pendiente', 'rechazado')";
            } else {
                // Mostrar solo aprobados
                $sql .= " WHERE l.estado = 'aprobado'";
            }

            $sql .= " ORDER BY l.fecha_registro DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getAllLibros: " . $e->getMessage());
            return [];
        }
    }

    public function buscarLibros($termino = '', $filtros = [])
    {
        try {
            $sql = "SELECT l.*, u.nombre as nombre_usuario 
                    FROM libros l 
                    INNER JOIN usuarios u ON l.usuario_id = u.id 
                    WHERE l.estado = 'aprobado'";
            $params = [];

            if (!empty($termino)) {
                $sql .= " AND (l.titulo LIKE :termino 
                        OR l.autor LIKE :termino 
                        OR l.descripcion LIKE :termino)";
                $params[':termino'] = "%$termino%";
            }

            if (!empty($filtros['genero'])) {
                $sql .= " AND l.genero = :genero";
                $params[':genero'] = $filtros['genero'];
            }

            $sql .= " ORDER BY l.fecha_registro DESC";

            $stmt = $this->conn->prepare($sql);
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en buscarLibros: " . $e->getMessage());
            return [];
        }
    }



    public function getLibroById($id)
    {
        try {
            $sql = "SELECT l.*, u.nombre as nombre_usuario 
                    FROM libros l 
                    INNER JOIN usuarios u ON l.usuario_id = u.id 
                    WHERE l.id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getLibroById: " . $e->getMessage());
            return null;
        }
    }

    public function cambiarEstado($id, $estado)
    {
        try {
            $sql = "UPDATE libros SET estado = :estado WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en cambiarEstado: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarLibro($id, $libro)
    {
        try {
            $sql = "UPDATE libros SET 
                    titulo = :titulo,
                    autor = :autor,
                    genero = :genero,
                    editorial = :editorial,
                    descripcion = :descripcion
                    WHERE id = :id";

            // Si hay una nueva imagen, añadimos ese campo a la actualización
            if (!empty($libro->getImagen())) {
                $sql = "UPDATE libros SET 
                        titulo = :titulo,
                        autor = :autor,
                        genero = :genero,
                        editorial = :editorial,
                        descripcion = :descripcion,
                        imagen = :imagen
                        WHERE id = :id";
            }

            $stmt = $this->conn->prepare($sql);

            // Bind de parámetros
            $stmt->bindParam(':titulo', $libro->getTitulo());
            $stmt->bindParam(':autor', $libro->getAutor());
            $stmt->bindParam(':genero', $libro->getGenero());
            $stmt->bindParam(':editorial', $libro->getEditorial());
            $stmt->bindParam(':descripcion', $libro->getDescripcion());
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if (!empty($libro->getImagen())) {
                $stmt->bindParam(':imagen', $libro->getImagen());
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en actualizarLibro: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarLibro($id)
    {
        try {
            $sql = "DELETE FROM libros WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en eliminarLibro: " . $e->getMessage());
            return false;
        }
    }
}
?>