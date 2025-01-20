<!-- Autor: Moran Vera Mickaell -->

<!-- Login.php -->
<div class="form-container">
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">
            <?php
            switch($_GET['error']) {
                case 'campos_vacios':
                    echo "Por favor, complete todos los campos";
                    break;
                case 'credenciales_invalidas':
                    echo "Email o contraseña incorrectos";
                    break;
                default:
                    echo "Ha ocurrido un error. Por favor, intente nuevamente";
            }
            ?>
        </div>
    <?php endif; ?>

    <form class="form-login" id="formulario" action="index.php?c=Login&f=login" method="POST" onsubmit="return validarFormulario()">
        <h2 class="form-title">Login</h2>

        <div class="form-input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Ingrese su correo" required>
        </div>

        <div class="form-input">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required>
        </div>

        <button type="submit" class="submit-btn button-uno">
            Iniciar sesión
        </button>
    </form>

    <div class="register-section">
        <p class="register-text">
            ¿No tienes una cuenta? ¿Qué esperas para registrarte? ¡Es gratis! Haz clic en el botón de abajo
        </p>
        <button type="button" class="register-btn button-dos" onclick="location.href='Register.html'">
            Registrarse
        </button>
    </div>
</div>
