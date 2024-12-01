<?php 
if (!empty($_POST["Btnregistrar"])) { 
    // Verifica si se ha enviado el formulario con el botón de registro ("Btnregistrar").
    
    if (empty($_POST["nombre"]) and empty($_POST["contraseña"])) {
        // Comprueba si los campos "nombre" y "contrasena" están vacíos.
        
        echo "<h1> Campos vacios </h1>";
        // Si los campos están vacíos, muestra un mensaje indicando "Campos vacíos".

    } else {
        // Si los campos no están vacíos, se procede a asignar valores a variables locales.
        
        $usuario = $_POST["nombre"];  
        $apellido = $_POST["apellido"]; 
        $edad = $_POST["edad"];  
        $telefono = $_POST["telefono"];      // Obtiene el valor del campo "nombre".
        $contrasena = $_POST["contrasena"];     // Obtiene el valor del campo "contrasena".
        
        // Ejecuta una consulta SQL para insertar los datos en la tabla `usuarios`.
        // Se asume que ya existe una conexión activa a la base de datos en $conexion.
        $sql=$conexion->query("INSERT INTO `tabla1` (`id`, `nombre`, `apellido`, `edad`, `telefono`, `contrasena`) VALUES (NULL, '$usuario', '$apellido', '$edad', '$telefono', '$contrasena');");
        
        echo "<h1> Datos guardados </h1>";
        // Muestra un mensaje indicando que los datos fueron guardados.

        header("location: login.php");
        // Redirige al usuario a la página de login.php después de guardar los datos.
    }
}
?>