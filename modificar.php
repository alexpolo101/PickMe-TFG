<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Modificar PickME";
$usuario="username";
$privilegio=0;
$creador='0';
$visibilidad = '1';
$acceso = false;
$logueado = false;
$vacio = false;

if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];
  $privilegio = $_SESSION['privilegio'];
  $creador=$_SESSION['idUsers'];
  $logueado = true;
}

if(!empty($_GET['nombre']) && $logueado){
  $nombrepick=$_GET['nombre'];
  $acceso = true;

  if(empty($_GET['id'])){
    $idpick = getPickMEid($conexion,$nombrepick);
  }else{
    $idpick=$_GET['id'];
  }

  $visibilidad = getPickMEvisibilidad($conexion,$idpick);

  getAlternativas($conexion,$idpick);
  getListaTests($conexion);
  getTusTest($conexion,$idpick);
}

if(isset($_GET['error'])){
  if($_GET['error'] == 'notassociated'){
    $vacio = true;
  }
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


if($acceso){
echo $twig->render('./templates/barra_lateral.html',['dash' => $dash, 'perf' => $perf, 'cole' => $cole, 'cre' => $cre,'administrador' => $administrador,'gest' => $gest,'imp' => $imp,'tst' => $tst]);
echo $twig->render('./templates/modificar.html',['nombrepagina' => $nombrepagina, 'usertop' => $usuario, 'creator' => $creador, 'nombrepick' => $nombrepick, 'idpick' => $idpick,'visible' => $visibilidad,'alternativas' => $alternativas, 'tests' => $todos_tests, 'tuyos' => $tuyos_tests]);
if($vacio){
    echo $twig->render('./templates/alert.html',['accion' => "Error", 'resultado' => "No existe un producto o test asociados"]);
}

}else{
  echo $twig->render('./templates/cabecera_oscura.html');
  echo $twig->render('./templates/404.html');
  echo $twig->render('./templates/footer.html');
}


?>
