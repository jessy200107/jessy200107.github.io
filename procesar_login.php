<?php
session_start();  // Asegúrate de que la sesión esté iniciada

if (isset($_POST["BTNlogin"])) { 
    // Verifica si se ha enviado el formulario con el botón "BTNlogin".
    
    if (empty($_POST["nombre"]) || empty($_POST["contrasena"]) || empty($_POST["captcha_input"])) { 
        // Comprueba si los campos "nombre", "contrasena" o "captcha_input" están vacíos.
        
        echo "<p style='color:red; font-size: 1rem;'>Los campos están vacíos</p>";
        // Si están vacíos, muestra un mensaje de advertencia en color rojo.
    } else { 
        // Si los campos no están vacíos, se procede a obtener los valores.
        
        $usuario = $_POST["nombre"];            // Obtiene el valor del campo "nombre".
        $contrasena = $_POST["contrasena"];     // Obtiene el valor del campo "contrasena".
        $captcha_input = $_POST["captcha_input"]; // Obtiene el valor del campo "captcha_input".
        
        $mensaje1 = "Usuario no existe";         // Mensaje de error si el usuario no se encuentra.
        $mensaje2 = "Contraseña no válida";      // Mensaje de error si la contraseña es incorrecta.
        $mensaje3 = "Complete el CAPTCHA";      // Mensaje si el CAPTCHA no es correcto.
        
        // Validar CAPTCHA
        if ($_SESSION['captcha'] !== $captcha_input) {
            echo "<script>alert('$mensaje3');</script>";
            exit;
        }
        
        // Consulta SQL para verificar si el usuario existe y obtener su contraseña
        $sql = $conexion->query("SELECT * FROM tabla1 WHERE nombre = '$usuario'");
        
        if ($datos = $sql->fetch_object()) { 
            // Si se encuentra un usuario con el nombre dado, se entra en este bloque.
            
            // Verificar si la contraseña ingresada coincide con la almacenada
            if ($datos->contrasena === $contrasena) { 
                // Si la contraseña coincide, redirige a la página de bienvenida.
                header("location: bienvenida.php");
                exit; // Asegúrate de que no se ejecute más código después de la redirección.
            } else { 
                // Si la contraseña no coincide, muestra un mensaje de error.
                echo "<script>alert('$mensaje2');</script>";
            }
            
        } else { 
            // Si no se encuentra un usuario con el nombre dado, muestra un mensaje de error.
            echo "<script>alert('$mensaje1');</script>";
        }
    }
}
?>
