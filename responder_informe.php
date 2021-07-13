<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Informe";
$usuario="username";
$privilegio='0';
$creador='0';
$logueado = false;
$accion = 0;
$acceso = false;
$promotores = [];
$pasivos = [];
$detractores = [];

if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];
  $iduser=$_SESSION['idUsers'];
  $logueado = true;
}

if (isset($_GET['id'])){
  $idpick = $_GET['id'];
  $nombrepick=getPickMEname($conexion,$idpick);
  getAlternativas($conexion,$idpick);
  getTusTest($conexion,$idpick);
  getNombreTest($conexion,$idpick,$tuyos_tests);
  getRanking($conexion,$idpick);
  //Sentencia que da error con el only full group by
  getRespuestas($conexion,$idpick);
  $acceso = true;
  $promotores = getPromotores($conexion,$idpick);
  $pasivos = getPasivos($conexion,$idpick);
  $detractores = getDetractores($conexion,$idpick);
}

date_default_timezone_set('Europe/London');

if($acceso){
  echo $twig->render('./templates/cabecera_oscura.html',['usertop' => $usuario, 'logueado' => $logueado]);
  echo $twig->render('./templates/responder_informe.html',['nombrepagina' => $nombrepagina, 'logueado' => $logueado, 'ranking' => $ranking, 'respuestas' => $respuestas, 'nombres_tests' => $nombres_tests,'promotores' => $promotores,'pasivos' => $pasivos,'detractores' => $detractores]);
  echo $twig->render('./templates/footer.html');

}else{
  echo $twig->render('./templates/cabecera_oscura.html');
  echo $twig->render('./templates/404.html');
  echo $twig->render('./templates/footer.html');
}
?>
