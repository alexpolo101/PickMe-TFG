<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

//include './php/sesion.php';
//include './sql/conexion.php';

$nombrepagina="Contacto";


date_default_timezone_set('Europe/London');


echo $twig->render('./templates/contacto.html',['nombrepagina' => $nombrepagina]);

//include './php/signup.php';

?>
