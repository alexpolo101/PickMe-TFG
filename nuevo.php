<?php require_once './Twig/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Creación de un nuevo PickME";
$usuario="username";
$privilegio='0';
$creador='0';


if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];
  $creador=$_SESSION['idUsers'];
}



date_default_timezone_set('Europe/London');


echo $twig->render('./nuevo.html',['nombre' => $nombrepagina, 'usertop' => $usuario, 'creator' => $creador]);


?>
