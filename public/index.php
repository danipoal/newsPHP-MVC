<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <nav>

    </nav>
    <main>

    </main>
    <?php
        require_once __DIR__ ."/../app/controllers/UserController.php";

        // Crear instancia del controlador
        $userController = new UserController();

        // Llamar al método `index` del controlador
        $userController->index();
    ?>

</body>
</html>