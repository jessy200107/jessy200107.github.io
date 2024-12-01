<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/registro.css">
    <title>Registrar</title>
</head>
<body>
    <div class="containerRegister">
        <form method="post" action="">
            <div class="form-group">
                <h1>Nombre</h1><input required name="nombre" type="text">
            </div>

            <div class="form-group">
                <h1>Apellidos</h1><input required name="apellidos" type="text">
            </div>

            <div class="form-group">
                <h1>Edad</h1><input required name="edad" type="number">
            </div>

            <div class="form-group">
                <h1>Telefono</h1><input required name="telefono" type="number">
            </div>

            <div class="form-group">
                <h1>Contraseña</h1><input name="contrasena" type="password" required>
            </div>

            <input name="Btnregistrar" class="btn1" type="submit">
            <button name="BtnLimpiar" class="btn2" type="reset">Limpiar</button>
            <?php
            include("model/conexion.php");
            include("procesar_registro.php");
            ?>
        </form>
    </div>
</body>
</html>