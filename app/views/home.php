<?php
    $title = "Newsphp"; // Título dinámico
    ob_start(); // Iniciar el buffer de salida
?>

<p>Bienvenidos a las Noticias php</p>

<?php
    $content = ob_get_clean(); // Obtener el contenido dinámico
    require_once __DIR__ . "/layouts/main.php"; // Cargar la plantilla base con el navbar...
?>

