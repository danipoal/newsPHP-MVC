<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Noticias' ?></title>
</head>
<body>
    <?php require_once __DIR__ . "/../components/navbar.php"; ?>

    <main style="width: 98vw;">
        <?= $content ?? '' ?> <!-- Aquí se cargará el contenido dinámico, que viene de las views -->
    </main>
</body>
</html>
