<?php
//Autor: Marco Antonio Salazar Mejia
class ArticuloDAO
{
    private $conn;

    public function __construct()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $this->conn = (new Database())->getConnection();
    }

    public function selectAll()
    {
        $sql = "select * from articulo where art_estado=1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }

    public function selectName($parametro)
    {
        // sql de la sentencia
        $sql = "select * from articulo where (art_titulo LIKE :b1)";
        //preparacion de la sentencia
        $stmt = $this->conn->prepare($sql);
        $conlike = "%" . $parametro . "%";
        $stmt->bindParam(":b1", $conlike, PDO::PARAM_STR);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultados;
    }

    public function selectOne($id)
    {
        $sql = "select * from articulo where art_id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        //recuperacion de resultados
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function insert($articulo)
    {
        try {
            $sql = "insert into articulo (art_titulo, art_introduccion, art_descripcion, art_conclusion,
            art_estado, cat_id, art_imagen, art_usuarioId, art_fecha, art_ref, art_autores)
             values(:titulo,:introduccion, :descripcion, :conclusion, :estado, :catId, :imagen,
              :usuarioId, :fechaPub, :referencias, :autores)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":titulo", $articulo->getTitulo(), PDO::PARAM_STR);
            $stmt->bindParam(":introduccion", $articulo->getIntroduccion(), PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $articulo->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindParam(":conclusion", $articulo->getConclusion(), PDO::PARAM_STR);
            $stmt->bindParam(":estado", $articulo->getEstado(), PDO::PARAM_INT);
            $stmt->bindParam(":catId", $articulo->getCategoriaId(), PDO::PARAM_INT);
            $stmt->bindParam(":imagen", $articulo->getImagen(), PDO::PARAM_STR);
            $stmt->bindParam(":usuarioId", $articulo->getUsuarioId(), PDO::PARAM_INT);
            $stmt->bindParam(":fechaPub", $articulo->getFechaRegistro(), PDO::PARAM_STR);
            $stmt->bindParam(":referencias", $articulo->getReferencias(), type: PDO::PARAM_STR);
            $stmt->bindParam(":autores", $articulo->getAutores(), type: PDO::PARAM_STR);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $er) {
            error_log("Error en el insert del articulo " . $er->getMessage());
            return false;
        }
    }
    public function update($articulo)
    {
        try {
            $sql = "UPDATE articulo 
                    SET art_titulo = :titulo, 
                        art_introduccion = :introduccion, 
                        art_descripcion = :descripcion, 
                        art_conclusion = :conclusion, 
                        art_estado = :estado, 
                        cat_id = :catId, 
                        art_imagen = :imagen, 
                        art_usuarioId = :usuarioId, 
                        art_fecha = :fechaPub, 
                        art_ref = :referencias, 
                        art_autores = :autores 
                    WHERE art_id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":titulo", $articulo->getTitulo(), PDO::PARAM_STR);
            $stmt->bindParam(":introduccion", $articulo->getIntroduccion(), PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $articulo->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindParam(":conclusion", $articulo->getConclusion(), PDO::PARAM_STR);
            $stmt->bindParam(":estado", $articulo->getEstado(), PDO::PARAM_INT);
            $stmt->bindParam(":catId", $articulo->getCategoriaId(), PDO::PARAM_INT);
            $stmt->bindParam(":imagen", $articulo->getImagen(), PDO::PARAM_STR);
            $stmt->bindParam(":usuarioId", $articulo->getUsuarioId(), PDO::PARAM_INT);
            $stmt->bindParam(":fechaPub", $articulo->getFechaRegistro(), PDO::PARAM_STR);
            $stmt->bindParam(":referencias", $articulo->getReferencias(), PDO::PARAM_STR);
            $stmt->bindParam(":autores", $articulo->getAutores(), PDO::PARAM_STR);
            $stmt->bindParam(":id", $articulo->getId(), PDO::PARAM_INT);

            $res = $stmt->execute();
            return $res;
        } catch (PDOException $er) {
            error_log("Error en el update del articulo: " . $er->getMessage());
            return false;
        }
    }


    public function logicalDelete($id)
    {
        try {
            $sql = "update articulo set art_estado=0 where art_id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $er) {
            error_log("Error en el logicalDelete de articulo " . $er->getMessage());
            return false;
        }
    }

}

?>