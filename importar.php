<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Importar";
$usuario="username";
$privilegio=0;
$alerta = false;
$acceso = false;
$seleccionado = -1;


if (isset($_SESSION['uidUsers'])){
  $usuario= $_SESSION['uidUsers'];
  $privilegio = $_SESSION['privilegio'];
  $idusuario = $_SESSION['idUsers'];

  if($privilegio>2){
    $acceso = true;
    getListaTests($conexion);
  }
}

if(isset($_GET['importar'])){
  $accion = "Importadas";
  $resultado = "Preguntas registradas correctamente";
  $alerta = true;
}else if(isset($_GET['error'])){
  $accion = "Error";
  $resultado = "Error al importar las preguntas";
  $alerta = true;
}

if(isset($_GET['creacion'])){
  $accion = "Test creado";
  $resultado = "Ahora debe añadir las preguntas";
  $seleccionado = $_GET['idtest'];
  $alerta = true;
}

date_default_timezone_set('Europe/London');

$dash = false;
$perf = false;
$cole = false;
$cre = false;

if($privilegio>2){
  $administrador = true;
  $gest = false;
  $imp = true;
  $tst = false;
}else{
  $administrador = false;
  $gest = false;
  $imp = false;
  $tst = false;
}
if($acceso){
echo $twig->render('./templates/barra_lateral.html',['dash' => $dash, 'perf' => $perf, 'cole' => $cole, 'cre' => $cre,'administrador' => $administrador,'gest' => $gest,'imp' => $imp,'tst' => $tst]);
if($alerta){
  echo $twig->render('./templates/alert.html',['accion' => $accion, 'resultado' => $resultado]);
}
echo $twig->render('./templates/importar.html',['nombre' => $nombrepagina, 'usertop' => $usuario,'todos_tests' => $todos_tests, 'seleccionado' => $seleccionado]);
}else{
  echo $twig->render('./templates/cabecera_oscura.html');
  echo $twig->render('./templates/404.html');
  echo $twig->render('./templates/footer.html');
}


?>
