<?php
    $title = "Página de Inicio"; // Título dinámico
    ob_start(); // Iniciar el buffer de salida
?>
<h1>Usuarios Registrados</h1>
<ul>
    <?php
        if (!empty($users)) {
            foreach ($users as $user) {
                echo "Nombre: " . $user->name . "<br>";
            }
        } else {
            echo "No hay usuarios disponibles.";
        }
    ?>
</ul>

<?php
    $content = ob_get_clean(); // Obtener el contenido dinámico
    require_once __DIR__ . "/../layouts/main.php"; // Cargar la plantilla base con el navbar...
?>

