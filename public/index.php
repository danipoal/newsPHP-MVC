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
    require_once __DIR__ ."/../app/views/home.php";
} elseif ($route === "/users/create" && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller = new UserController();
    
    if($controller->createUser() == 0){
        // Si el nuevo usuario ya estaba en la bd, enseñamos error
        echo 'Ya estaba en la BD, Error al crear';
    }else {
        // Si no estaba creado, recargamos el index
        $controller->index();
    }
} elseif($route === "/users/delete" && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller = new UserController();
    $controller->deleteUser();
    $controller->index();

} else {
    echo "Página no encontrada.";
}
?>
