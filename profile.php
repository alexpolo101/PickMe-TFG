<?php require_once './Twig/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Perfil";
$usuario="username";
$privilegio='0';


if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];

}



date_default_timezone_set('Europe/London');


echo $twig->render('./profile.html',['nombre' => $nombrepagina, 'usertop' => $usuario]);


?>
