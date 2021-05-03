<?php require_once './Twig/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Dashboard";
$usuario="username";
$privilegio='0';

$todos_o_tuyos = 'Sus PickME';
$creados = 0;
$respondidas = 0;

if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];

  $creados = getCreados($conexion,$_SESSION['idUsers']);
  $respondidas = getRespondidas($conexion,$_SESSION['idUsers']);
}

if (isset($_SESSION['uidUsers'])) {
  if ($_SESSION['privilegio'] > 2){
    $todos_o_tuyos = 'Todos los PickME';
  }
}


date_default_timezone_set('Europe/London');


echo $twig->render('./dashboard.html',['nombre' => $nombrepagina, 'usertop' => $usuario, 'creados' => $creados, 'respondidas' => $respondidas]);


?>
