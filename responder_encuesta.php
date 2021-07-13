<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Responder";
$usuario="username";
$privilegio='0';
$creador='0';
$logueado = false;
$idencuestado = NULL;
$etiqueta = -1;
$numtags = -1;

$npreguntas = 0;
$subtext = "";
$min = 0;
$max = 100;

if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];
  $idencuestado=$_SESSION['idUsers'];
  $logueado = true;
}

if (isset($_POST['id'])){
  $idpick = $_POST['id'];
  $idtest = $_POST['idtest'];
  $rol = $_POST['rol'];
  $nombrepick=getPickMEname($conexion,$idpick);
  getAlternativas($conexion,$idpick);
  getPreguntas($conexion,$idtest);
  $npreguntas = count($preguntas);
  $nalternativas = count($alternativas);

  $etiqueta = getEtiqueta($conexion,$idtest);
  $numtags = getNumTags($conexion,$etiqueta);

}

if($idtest == 1){
  $subtext = "Marque del 1 al 5, siendo: 5 completamente de acuerdo con esta afirmación y 1 completamente en desacuerdo";
  $min = 0;
  $max = 10000;
}

if($idtest==9){
  $max = 10;
  $min = 0;
}

date_default_timezone_set('Europe/London');
echo $twig->render('./templates/responder_encuesta.html',['nombrepagina' => $nombrepagina, 'idencuestado' => $idencuestado, 'nombrepick' => $nombrepick, 'idpick' => $idpick, 'idtest' => $idtest,'alternativas' => $alternativas, 'preguntas' => $preguntas,'npreguntas' => $npreguntas,'nalternativas' => $nalternativas, 'etiqueta' => $etiqueta, 'max' => $max, 'min' => $min, 'rol' => $rol,'numtags' => $numtags]);
echo $twig->render('./templates/footer.html');

?>
