<!-- Autor: Marco Antonio Salazar Mejia-->
<?php
class CategoriaDAO{
    private $conn;

    public function __construct()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $this->conn = (new Database())->getConnection();
    }

    public function selectAll() {
        // sql de la sentencia
        $sql = "select * from categoria where cat_estado=1";
        //preparacion de la sentencia
        $stmt = $this->conn->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna cada fila como un objeto de una clase anonima
        // cuyos nombres de atributos son iguales a los nombres de las columnas retornadas
        // retorna datos para el controlador
        return $resultados;
    }

    public function selectName($parametro) {
        // sql de la sentencia
        $sql = "select * from categoria where (cat_nombre LIKE :b1)";
        //preparacion de la sentencia
        $stmt = $this->conn->prepare($sql);
        $conlike = "%".$parametro."%";
        $stmt->bindParam(":b1", $conlike, PDO::PARAM_STR);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retorna cada fila como un objeto de una clase anonima
        // cuyos nombres de atributos son iguales a los nombres de las columnas retornadas
        // retorna datos para el controlador
        return $resultados;
    }

    public function selectOne($id) {
        try{
            $sql = "select * from categoria where cat_id = :id";//importante el = :id
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        }catch(PDOException $er){
            error_log("Error en selectOne de categoriaDAO ". $er->getMessage());
            echo("Error en selectOne de categoriaDAO ". $er->getMessage());
            return null;
        }
    }


    public function insert($categoria){
        try{
            $sql = "insert into categoria (cat_nombre, cat_descripcion, cat_estado)
             values(:nombre, :descripcion, :estado)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nombre", $categoria->getNombre(), PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $categoria->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindParam(":estado", $categoria->getEstado(), PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        }catch(PDOException $er){
            error_log("Error en el insert de la categoria ". $er->getMessage());
            return false;
        }
    }

    public function update($categoria){
        try{
            $sql = "update categoria set cat_nombre= :nombre,  cat_descripcion= :descripcion,
             cat_estado= :estado where cat_id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $categoria->getId(), PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $categoria->getNombre(), PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $categoria->getDescripcion(), PDO::PARAM_STR);
            $stmt->bindParam(":estado", $categoria->getEstado(), PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        }catch(PDOException $er){
            error_log("Error en el update de categoria ". $er->getMessage());
            return false;
        }
    }

    public function logicalDelete($id){
        try{
            $sql = "update categoria set cat_estado= 0 where cat_id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        }catch(PDOException $er){
            error_log("Error en el logicalDelete de categoria ". $er->getMessage());
            return false;
        }
    }

}

?>