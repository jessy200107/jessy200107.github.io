<?php
session_start();
header('Content-Type: image/png');

// Generar el texto del CAPTCHA
$captcha_text = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, 6);
$_SESSION['captcha'] = $captcha_text;

// Crear imagen
$image = imagecreate(150, 50);
$background_color = imagecolorallocate($image, 220, 220, 220);
$text_color = imagecolorallocate($image, 50, 50, 50);
$line_color = imagecolorallocate($image, 200, 200, 200);

// Añadir líneas de ruido
for ($i = 0; $i < 5; $i++) {
    imageline($image, rand(0, 150), rand(0, 50), rand(0, 150), rand(0, 50), $line_color);
}

// Añadir el texto del CAPTCHA
$font_path = __DIR__ . '/arial.ttf'; // Ruta de la fuente TTF
if (file_exists($font_path)) {
    imagettftext($image, 20, rand(-10, 10), 10, 35, $text_color, $font_path, $captcha_text);
} else {
    imagestring($image, 5, 40, 15, $captcha_text, $text_color);
}

// Enviar la imagen al navegador
imagepng($image);
imagedestroy($image);
?>