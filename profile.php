<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Perfil";
$usuario="username";
$privilegio=0;
$conocimiento = 1;
$alerta = false;


if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];
  $usertop = $usuario;
  $privilegio = $_SESSION['privilegio'];
  $idusuario = $_SESSION['idUsers'];
  $conocimiento= getConocimiento($conexion,$idusuario);
}

if (isset($_GET['idUser']) && $privilegio>2){
  $idusuario = $_GET['idUser'];
  $usuario= getUsername($conexion,$idusuario);
  $conocimiento= getConocimiento($conexion,$idusuario);
}

if(isset($_GET['update'])){
  $accion = "Actualización";
  $resultado = "realizada con éxito";
  $alerta = true;
}else if(isset($_GET['error'])){
  $accion = "Error";
  $resultado = "Error al actualizar los datos";
  $alerta = true;
}


date_default_timezone_set('Europe/London');

$dash = false;
$perf = true;
$cole = false;
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

echo $twig->render('./templates/barra_lateral.html',['dash' => $dash, 'perf' => $perf, 'cole' => $cole, 'cre' => $cre,'administrador' => $administrador,'gest' => $gest,'imp' => $imp,'tst' => $tst]);
if($alerta){
  echo $twig->render('./templates/alert.html',['accion' => $accion, 'resultado' => $resultado]);
}
echo $twig->render('./templates/profile.html',['nombre' => $nombrepagina, 'usertop' => $usertop, 'usuario' => $usuario, 'iduser' => $idusuario,'conocimiento' => $conocimiento]);


?>
