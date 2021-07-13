<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Gestión de usuarios";
$usuario="username";
$privilegio=0;
$numusers = 0;
$acceso = false;

$by = 'idUsers';
$modo = 'ASC';

if(isset($_POST['orden-submit'])) {
  $by = $_POST['by'];
  $modo = $_POST['type'];
}

if (isset($_SESSION['uidUsers'])){
  $usuario= $_SESSION['uidUsers'];
  $privilegio = $_SESSION['privilegio'];
  $idusuario = $_SESSION['idUsers'];
  if($privilegio>2){
    $acceso = true;
  }

  getListaUsers($conexion,$by,$modo);

  if(!empty($usuarios)){
    $numusers = count($usuarios);
  }
}

date_default_timezone_set('Europe/London');

$dash = false;
$perf = false;
$cole = false;
$cre = false;

if($privilegio>2){
  $administrador = true;
  $gest = true;
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
echo $twig->render('./templates/gestion.html',['nombre' => $nombrepagina, 'usertop' => $usuario,'usuarios' => $usuarios,'numusers' => $numusers]);
}else{
  echo $twig->render('./templates/cabecera_oscura.html');
  echo $twig->render('./templates/404.html');
  echo $twig->render('./templates/footer.html');
}


?>
