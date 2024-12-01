<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="containerLogin">
        <form method="post" action="">
            <div class="form-group">
                <h1>Usuario</h1>
                <input class="text" type="text" name="nombre">
            </div>

            <div class="form-group">
                <h1>Contraseña</h1>
                <input class="text" type="password" name="contrasena">
            </div>

            <div class="form-group">
                <h1>Ingresa el texto del CAPTCHA:</h1>
                <img src="captcha.php" alt="CAPTCHA" id="captcha">
                <button class="btn" type="button" onclick="reloadCaptcha()">Actualizar CAPTCHA</button> <!-- Botón para actualizar CAPTCHA -->
                <input class="text" type="text" name="captcha_input" required>
            </div>

            <div class="form-group">
                <button class="btn" type="submit" name="BTNlogin">Enviar</button> <!-- Botón para enviar -->
            </div>

            <a class="register-link" href="registro.php">¿No tienes cuenta? Regístrate</a>
            <?php
            include("model/conexion.php");
            include("procesar_login.php");
            ?>
        </form>
    </div>
    <script>
        function reloadCaptcha() {
            document.getElementById('captcha').src = 'captcha.php?' + Date.now();
        }
    </script>
</body>
</html>
