<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

//include './php/sesion.php';
//include './sql/conexion.php';

$nombrepagina="Contraseña olvidada";


date_default_timezone_set('Europe/London');


echo $twig->render('./templates/forgot-password.html',['nombre' => $nombrepagina]);

//include './php/signup.php';

?>
