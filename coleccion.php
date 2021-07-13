<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Colección de PickME";
$usuario="username";
$privilegio=0;
$limit = 20;
$offset = 0;
$page = 1;
$paginado = true;
$by = 'fecha';
$modo = 'DESC';

if (isset($_GET['page'])){
  $offset = $offset + $limit*$_GET['page'];
  $page = $_GET['page'];
}

if (isset($_GET['all'])){
  $paginado = false;
}

if(isset($_POST['orden-submit'])) {
  $by = $_POST['by'];
  $modo = $_POST['type'];
}

if (isset($_SESSION['uidUsers'])){
  $usuario= $_SESSION['uidUsers'];
  $privilegio = $_SESSION['privilegio'];
  $idusuario = $_SESSION['idUsers'];

  getListaPickME($conexion,$privilegio,$limit,$offset,$paginado,$by,$modo);
  getListaAlternativas($conexion);
}

$inicio = $offset+1;
$fin = $offset+$limit;
$activado = false;

if($privilegio>1){
  $activado = true;
}

date_default_timezone_set('Europe/London');

$dash = false;
$perf = false;
$cole = true;
$cre = false;

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

echo $twig->render('./templates/barra_lateral.html',['dash' => $dash, 'perf' => $perf, 'cole' => $cole, 'cre' => $cre,'administrador' => $administrador,'gest' => $gest,'imp' => $imp, 'tst' => $tst]);
echo $twig->render('./templates/coleccion.html',['nombre' => $nombrepagina, 'usertop' => $usuario, 'todos' => $todos, 'todos_alternativas' => $todos_alternativas, 'inicio' => $inicio, 'fin' => $fin, 'page' => $page, 'paginado' => $paginado, 'activado' => $activado]);


?>
