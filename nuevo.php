<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Creación de un nuevo PickME";
$usuario="username";
$privilegio=0;
$creador='0';


if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];
  $privilegio = $_SESSION['privilegio'];
  $creador=$_SESSION['idUsers'];
}



date_default_timezone_set('Europe/London');

$dash = false;
$perf = false;
$cole = false;
$cre = true;

if($privilegio>2){
  $administrador = true;
  $gest = false;
  $imp = false;
  $tst = false;
}else{
  $administrador = false;
  $gest = false;
  $imp = false;
  $tst = false;
}

echo $twig->render('./templates/barra_lateral.html',['dash' => $dash, 'perf' => $perf, 'cole' => $cole, 'cre' => $cre,'administrador' => $administrador,'gest' => $gest,'imp' => $imp,'tst' => $tst]);
echo $twig->render('./templates/nuevo.html',['nombre' => $nombrepagina, 'usertop' => $usuario, 'creator' => $creador]);


?>
