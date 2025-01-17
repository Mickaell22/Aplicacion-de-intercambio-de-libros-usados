<!-- Autor: Moran Vera Mickaell -->
<?php
class LibroDTO {
    private $id;
    private $titulo;
    private $autor;
    private $genero;
    private $anio;
    private $editorial;
    private $descripcion;
    private $imagen;
    private $estado;
    private $usuario_id;
    private $fecha_registro;

    // Getters
    public function getId() { return $this->id; }
    public function getTitulo() { return $this->titulo; }
    public function getAutor() { return $this->autor; }
    public function getGenero() { return $this->genero; }
    public function getAnio() { return $this->anio; }
    public function getEditorial() { return $this->editorial; }
    public function getDescripcion() { return $this->descripcion; }
    public function getImagen() { return $this->imagen; }
    public function getEstado() { return $this->estado; }
    public function getUsuarioId() { return $this->usuario_id; }
    public function getFechaRegistro() { return $this->fecha_registro; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setAutor($autor) { $this->autor = $autor; }
    public function setGenero($genero) { $this->genero = $genero; }
    public function setAnio($anio) { $this->anio = $anio; }
    public function setEditorial($editorial) { $this->editorial = $editorial; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setImagen($imagen) { $this->imagen = $imagen; }
    public function setEstado($estado) { $this->estado = $estado; }
    public function setUsuarioId($usuario_id) { $this->usuario_id = $usuario_id; }
    public function setFechaRegistro($fecha_registro) { $this->fecha_registro = $fecha_registro; }
}
?>