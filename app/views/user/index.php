<?php
    $title = "Usuarios"; // Título dinámico
    ob_start(); // Iniciar el buffer de salida
?>

<link rel="stylesheet" href="/NoticiasPHP/public/css/users.css">
<h1>Usuarios Registrados</h1>
<div class="users-container">
    <ul>
        <?php
            $contador = 1;
            if (!empty($users)) {
                foreach ($users as $user) {
                    echo '<div class="list-item">';
                        echo $contador .' - ' . $user->name . ' (' . $user->email . ')';
                        echo '<div><button class="edit-button">Edit</button>';
                        echo '<button class="delete-button">Delete</button></div>';
                    echo '</div>';
                    $contador++;
                }
            } else {
                echo "No hay usuarios disponibles.";
            }
        ?>
    </ul>
    <div class="create-container">
        <h2>Crear un Usuario</h2>
        <form action="/NoticiasPHP/public/users/create" method="post">
            <label for="name">Nombre: </label>
            <input name="name" type="text">

            <label for="email">Email: </label>
            <input name="email" type="email">

            <label for="password">Contraseña: </label>
            <input name="password" type="password">

            <button type="submit">Agregar</button>
        </form>
    </div>
</div>


<?php
    $content = ob_get_clean(); // Obtener el contenido dinámico
    require_once __DIR__ . "/../layouts/main.php"; // Cargar la plantilla base con el navbar...
?>

