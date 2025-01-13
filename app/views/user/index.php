<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
</head>
<body>
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
</body>
</html>
