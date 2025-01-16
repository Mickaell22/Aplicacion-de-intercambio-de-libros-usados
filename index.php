<?php
require_once 'config/config.php';

// Iniciar sesión una sola vez al principio del archivo
session_start();

// FrontController
$controlador = (!empty($_REQUEST['c'])) ? htmlentities($_REQUEST['c']) : 'Login';
$controlador = ucwords(strtolower($controlador)) . "Controller";
$funcion = (!empty($_REQUEST['f'])) ? htmlentities($_REQUEST['f']) : 'login';

require_once 'controller/' . $controlador . '.php';
$cont = new $controlador();
$cont->$funcion();
?>