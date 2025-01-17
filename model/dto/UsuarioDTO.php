<?php
class UsuarioDTO {
    private $id;
    private $nombre;
    private $apellido;
    private $nombre_usuario;
    private $numero_celular;
    private $pais;
    private $ubicacion;
    private $fecha_nacimiento;
    private $genero;
    private $correo_electronico;
    private $contrasena;
    private $rol;

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getNombreUsuario() { return $this->nombre_usuario; }
    public function getNumeroCelular() { return $this->numero_celular; }
    public function getPais() { return $this->pais; }
    public function getUbicacion() { return $this->ubicacion; }
    public function getFechaNacimiento() { return $this->fecha_nacimiento; }
    public function getGenero() { return $this->genero; }
    public function getCorreoElectronico() { return $this->correo_electronico; }
    public function getContrasena() { return $this->contrasena; }
    public function getRol() { return $this->rol;    }


    // Setters
    public function setRol($rol) { $this->rol = $rol;
    }
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setNombreUsuario($nombre_usuario) { $this->nombre_usuario = $nombre_usuario; }
    public function setNumeroCelular($numero_celular) { $this->numero_celular = $numero_celular; }
    public function setPais($pais) { $this->pais = $pais; }
    public function setUbicacion($ubicacion) { $this->ubicacion = $ubicacion; }
    public function setFechaNacimiento($fecha_nacimiento) { $this->fecha_nacimiento = $fecha_nacimiento; }
    public function setGenero($genero) { $this->genero = $genero; }
    public function setCorreoElectronico($correo_electronico) { $this->correo_electronico = $correo_electronico; }
    public function setContrasena($contrasena) { $this->contrasena = $contrasena; }
}
?>