<?php
// Obtener parámetros del controlador y la acción
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Convención de nombres (ej: product -> ProductController)
$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = '../controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerObject = new $controllerName();

    if (method_exists($controllerObject, $action)) {
        // Ejecutar la acción
        $controllerObject->$action();
    } else {
        echo "La acción '$action' no existe.";
    }
} else {
    echo "El controlador '$controllerName' no existe.";
}
?>