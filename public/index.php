<?php
require_once "../app/controllers/UserController.php";

// Obtener la URL solicitada
$requestUri = $_SERVER['REQUEST_URI'];

// Quitar el prefijo "/NoticiasPHP/public" de la URL
$basePath = "/NoticiasPHP/public";
$route = str_replace($basePath, "", $requestUri);

echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "<br>";
echo "QUERY_STRING: " . $_SERVER['QUERY_STRING'] . "<br>";

// Verificar la ruta y llamar al controlador correspondiente
if ($route === "/users") {
    $controller = new UserController();
    $controller->index();
} elseif ($route === "/home" || $route === "/") {
    echo "Página de inicio (home)";
} elseif ($route === "/users/create" && $_SERVER['REQUEST_METHOD'] === 'POST'){
    echo 'Creando usuario';
    $controller = new UserController();
    $controller->createUser();
} else {
    echo "Página no encontrada.";
}
?>
