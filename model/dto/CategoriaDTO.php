<!-- Autor: Marco Antonio Salazar Mejia-->
<?php
class CategoriaDTO
{
    private $id;
    private $nombre;
    private $descripcion;
    private $estado;

    public function __construct()
    {
    }

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    // Methods get y set parametrizados
    public function __set($nombre, $valor)
    {
        // Verifica que la propiedad exista
        if (property_exists('Categoria', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre)
    {
        // Verifica que exista la propiedad
        if (property_exists('Categoria', $nombre)) {
            return $this->$nombre;
        }
        // Retorna null si no existe
        return NULL;
    }

}

?>