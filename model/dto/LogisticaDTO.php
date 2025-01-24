<!-- Autor: Troya Garzón Geancarlos -->
<?php
class LogisticaDTO {
    private $id;
    private $fechaintercambio;
    private $fecharegistro;
    private $usuario_id;
    private $ubicacion;
    private $calificacion;
    private $estado;
    private $metodo;

    // Getters
    public function getId() { return $this->id; }
    public function getFechaintercambio() { return $this->fechaintercambio; }
    public function getFecharegistro() { return $this->fecharegistro; }
    public function getUsuarioId() { return $this->usuario_id; }
    public function getUbicacion() { return $this->ubicacion; }
    public function getCalificacion() { return $this->calificacion; }
    public function getEstado() { return $this->estado; }
    public function getMetodo() { return $this->metodo; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setFechaintercambio($fechaintercambio) { $this->fechaintercambio = $fechaintercambio; }
    public function setFecharegistro($fecharegistro) { $this->fecharegistro = $fecharegistro; }
    public function setUsuarioId($usuario_id) { $this->usuario_id = $usuario_id; }
    public function setUbicacion($ubicacion) { $this->ubicacion = $ubicacion; }
    public function setCalificacion($calificacion) { $this->calificacion = $calificacion; }
    public function setEstado($estado) { $this->estado = $estado; }
    public function setMetodo($metodo) { $this->metodo = $metodo; }
}
?>
