<?php
class DenunciaDTO {
    private $id;
    private $libro_id;
    private $usuario_id;
    private $tipo;
    private $descripcion;
    private $evidencia;
    private $fecha_incidente;
    private $fecha_registro;
    private $estado;

    // Getters
    public function getId() { return $this->id; }
    public function getLibroId() { return $this->libro_id; }
    public function getUsuarioId() { return $this->usuario_id; }
    public function getTipo() { return $this->tipo; }
    public function getDescripcion() { return $this->descripcion; }
    public function getEvidencia() { return $this->evidencia; }
    public function getFechaIncidente() { return $this->fecha_incidente; }
    public function getFechaRegistro() { return $this->fecha_registro; }
    public function getEstado() { return $this->estado; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setLibroId($libro_id) { $this->libro_id = $libro_id; }
    public function setUsuarioId($usuario_id) { $this->usuario_id = $usuario_id; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setEvidencia($evidencia) { $this->evidencia = $evidencia; }
    public function setFechaIncidente($fecha_incidente) { $this->fecha_incidente = $fecha_incidente; }
    public function setFechaRegistro($fecha_registro) { $this->fecha_registro = $fecha_registro; }
    public function setEstado($estado) { $this->estado = $estado; }
}
?>