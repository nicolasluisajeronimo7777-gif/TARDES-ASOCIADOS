<?php
session_start();

// Eliminar todas las variables de sesión
$_SESSION = [];

// Si se usa una cookie de sesión, eliminarla del navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), 
        '', 
        time() - 42000,
        $params["path"], 
        $params["domain"],
        $params["secure"], 
        $params["httponly"]
    );
}

// Destruir la sesión completamente
session_destroy();

// Evitar que el navegador guarde caché y permita volver atrás
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

// Redirigir al login
header("Location: login.php");
exit();
?>
