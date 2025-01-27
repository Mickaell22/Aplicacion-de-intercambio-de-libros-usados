<?php
//Autor: Marco Antonio Salazar Mejia
class ArticuloDTO{
    private $id;
    private $titulo;
    private $introduccion;
    private $descripcion;
    private $conclusion;
    private $categoriaId;
    private $imagen;
    private $estado;
    private $usuarioId;
    private $fechaRegistro;
    private $referencias;
    private $autores;

     // Getters
     public function getId() { return $this->id; }
     public function getTitulo() { return $this->titulo; }
     public function getIntroduccion() { return $this->introduccion; }
     public function getDescripcion() { return $this->descripcion; }
     public function getConclusion() { return $this->conclusion; }
     public function getCategoriaId() { return $this->categoriaId; }
     public function getImagen() { return $this->imagen; }
     public function getEstado() { return $this->estado; }
     public function getUsuarioId() { return $this->usuarioId; }
     public function getFechaRegistro() { return $this->fechaRegistro; }
     public function getReferencias() { return $this->referencias; }
     public function getAutores() { return $this->autores; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setIntroduccion($intro) { $this->introduccion = $intro; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setConclusion($conclusion) { $this->conclusion = $conclusion; }
    public function setCategoriaId($catId) { $this->categoriaId = $catId; }
    public function setImagen($imagen) { $this->imagen = $imagen; }
    public function setEstado($estado) { $this->estado = $estado; }
    public function setUsuarioId($usuario_id) { $this->usuarioId = $usuario_id; }
    public function setFechaRegistro($fecha_registro) { $this->fechaRegistro = $fecha_registro; }
    public function setReferencias($ref) { $this->referencias = $ref; }
    public function setAutores($at) { $this->autores = $at; }
}

?>