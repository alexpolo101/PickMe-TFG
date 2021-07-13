<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Nuevo test";
$usuario="username";
$privilegio=0;
$numtests = 0;
$acceso = false;

$by = 'tests.idTest';
$modo = 'ASC';

if(isset($_GET['error'])){
  $accion = "Error";
  if($_GET['error']=="emptyfields"){
    $resultado = "Debe rellenar todos los campos";
  }elseif ($_GET['error']=="nombreyaexiste") {
    $resultado = "El nombre indicado para el test ya existe, escoja otro";
  }else{
    $resultado = "Error en la base de datos";
  }
  $alerta = true;
}

if (isset($_SESSION['uidUsers'])){
  $usuario= $_SESSION['uidUsers'];
  $privilegio = $_SESSION['privilegio'];
  $idusuario = $_SESSION['idUsers'];
  if($privilegio>2){
    $acceso = true;
  }

  getListaEtiquetas($conexion);
}

date_default_timezone_set('Europe/London');

$dash = false;
$perf = false;
$cole = false;
$cre = false;

if($privilegio>2){
  $administrador = true;
  $gest = false;
  $imp = false;
  $tst = true;
}else{
  $administrador = false;
  $gest = false;
  $imp = false;
  $tst = true;
}

if($acceso){
echo $twig->render('./templates/barra_lateral.html',['dash' => $dash, 'perf' => $perf, 'cole' => $cole, 'cre' => $cre,'administrador' => $administrador,'gest' => $gest,'imp' => $imp,'tst' => $tst]);
echo $twig->render('./templates/nuevo_test.html',['nombre' => $nombrepagina, 'usertop' => $usuario,'listaetiquetas' => $listaetiquetas]);
if($alerta){
  echo $twig->render('./templates/alert.html',['accion' => $accion, 'resultado' => $resultado]);
}
}else{
  echo $twig->render('./templates/cabecera_oscura.html');
  echo $twig->render('./templates/404.html');
  echo $twig->render('./templates/footer.html');
}


?>
