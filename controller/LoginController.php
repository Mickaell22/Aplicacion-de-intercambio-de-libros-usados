<?php
class LoginController {
    private $loginDAO;
    
    public function __construct() {
        require_once 'model/dao/LoginDAO.php';
        $this->loginDAO = new LoginDAO();
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener y sanitizar los datos del formulario
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            
            // Validar que los campos no estén vacíos
            if (empty($email) || empty($password)) {
                header('Location: ' . URL_BASE . 'index.php?error=campos_vacios');
                exit;
            }
            
            // Validar formato de email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ' . URL_BASE . 'index.php?error=email_invalido');
                exit;
            }
            
            try {
                // Intentar validar al usuario
                $usuario = $this->loginDAO->validarUsuario($email, $password);
                
                if ($usuario) {
                    // Usuario válido - Crear sesión
                    $_SESSION['usuario_id'] = $usuario->getId();
                    $_SESSION['usuario_nombre'] = $usuario->getNombre();
                    $_SESSION['usuario_apellido'] = $usuario->getApellido();
                    $_SESSION['usuario_username'] = $usuario->getNombreUsuario();
                    $_SESSION['usuario_email'] = $usuario->getCorreoElectronico();
                    $_SESSION['usuario_pais'] = $usuario->getPais();
                    $_SESSION['usuario_ubicacion'] = $usuario->getUbicacion();
                    $_SESSION['rol'] = $usuario->getRol();
                    
                    // Establecer cookie de "recordar sesión" si se solicitó
                    if (isset($_POST['recordar']) && $_POST['recordar'] == '1') {
                        $token = bin2hex(random_bytes(32));
                        setcookie('remember_token', $token, time() + (86400 * 30), '/');
                    }
                    
                    // Redirigir según el rol
                    if ($usuario->getRol() === 'admin') {
                        header('Location: ' . URL_BASE . 'index.php?c=busqueda&f=index');
                    } else {
                        header('Location: ' . URL_BASE . 'index.php?c=busqueda&f=index');
                    }
                    exit;
                } else {
                    // Credenciales inválidas
                    header('Location: ' . URL_BASE . 'index.php?error=credenciales_invalidas');
                    exit;
                }
            } catch (Exception $e) {
                error_log("Error en login: " . $e->getMessage());
                header('Location: ' . URL_BASE . 'index.php?error=error_sistema');
                exit;
            }
        } else {
            // Para peticiones GET
            if (!isset($_SESSION['usuario_id']) && isset($_COOKIE['remember_token'])) {
                // TODO: Implementar la validación del token
                // $this->loginDAO->validarToken($_COOKIE['remember_token']);
            }
            
            require_once 'view/templates/main.php';
        }
    }
    
    public function logout() {
        // Limpiar todas las variables de sesión
        $_SESSION = array();
        
        // Eliminar la cookie de sesión
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        
        // Eliminar la cookie de "recordar sesión"
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/');
            // Aquí podrías invalidar el token en la base de datos
        }
        
        // Destruir la sesión
        session_destroy();
        
        // Redirigir al login
        header('Location: ' . URL_BASE . 'index.php');
        exit;
    }

    
    private function getMensajeError($codigo) {
        $mensajes = [
            'campos_vacios' => 'Por favor, complete todos los campos',
            'email_invalido' => 'El formato del email no es válido',
            'credenciales_invalidas' => 'Email o contraseña incorrectos',
            'error_sistema' => 'Ha ocurrido un error en el sistema. Por favor, intente más tarde',
        ];
        
        return isset($mensajes[$codigo]) ? $mensajes[$codigo] : 'Ha ocurrido un error';
    }
}
?>