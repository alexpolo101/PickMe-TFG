<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Iniciar PickME";
$usuario="username";
$privilegio='0';
$creador='0';
$logueado = false;
$accion = 0;
$acceso = false;
$iduser = 0;
$respondidas_tests = [];
$nombres_tests = [];
$informe = false;
$tiempo_estimado = 0;

if (isset($_SESSION['uidUsers'])){
  $usuario=$_SESSION['uidUsers'];
  $iduser=$_SESSION['idUsers'];
  $logueado = true;
}

if (isset($_GET['id'])){
  $idpick = $_GET['id'];
  $nombrepick=getPickMEname($conexion,$idpick);
  $creador = getPickMEcreador($conexion,$idpick);
  $acceso = true;
  getAlternativas($conexion,$idpick);
  getTusTest($conexion,$idpick);
  getNombreTest($conexion,$idpick,$tuyos_tests);
  if($iduser != 0){
    getYaRespondidas($conexion,$iduser,$idpick);
    if($respondidas_tests != null){
      if(count($respondidas_tests)==count($nombres_tests)){
      $informe=true;
      }
    }
  }
  //Calcular tiempo estimado de encuesta
  if($nombres_tests!=null){
    for ($i = 0; $i < count($nombres_tests); $i++) {
      if($nombres_tests[$i]['idTest']==1){
        $tiempo_estimado = $tiempo_estimado + 10;
      }elseif ($nombres_tests[$i]['idTest']==2 || $nombres_tests[$i]['idTest']==3 || $nombres_tests[$i]['idTest']==4) {
        $tiempo_estimado = $tiempo_estimado + 20;
      }elseif ($nombres_tests[$i]['idTest']==9) {
        $tiempo_estimado = $tiempo_estimado + 1;
      }else{
        $tiempo_estimado = $tiempo_estimado + 5;
      }
    }
    if($respondidas_tests!=null){
      for ($i = 0; $i < count($respondidas_tests); $i++) {
        if($respondidas_tests[$i]['idTest']==1){
          $tiempo_estimado = $tiempo_estimado - 10;
        }elseif ($respondidas_tests[$i]['idTest']==2 || $respondidas_tests[$i]['idTest']==3 || $respondidas_tests[$i]['idTest']==4) {
          $tiempo_estimado = $tiempo_estimado - 20;
        }elseif ($respondidas_tests[$i]['idTest']==9) {
          $tiempo_estimado = $tiempo_estimado - 1;
        }else{
          $tiempo_estimado = $tiempo_estimado - 5;
        }
      }
    }
    if($alternativas!=null){
    $tiempo_estimado = $tiempo_estimado * count($alternativas);
    }
  }

}

if(isset($_GET['respuesta'])){
  $accion = "Enviado";
  $resultado = "Respuestas registradas correctamente";
}else if(isset($_GET['error'])){
  $accion = "Error";
  $resultado = "Error en la base de datos";
}

date_default_timezone_set('Europe/London');

if($acceso){
if($nombres_tests== null || $alternativas==null){
  header("Location: ../modificar.php?error=notassociated&id=$idpick&nombre=$nombrepick");
  exit();
}else{
echo $twig->render('./templates/cabecera_oscura.html',['usertop' => $usuario, 'logueado' => $logueado]);
echo $twig->render('./templates/responder_inicio.html',['nombrepagina' => $nombrepagina, 'iduser' => $iduser, 'nombrepick' => $nombrepick, 'idpick' => $idpick,'alternativas' => $alternativas, 'nombres_tests' => $nombres_tests,'respondidas_tests' => $respondidas_tests, 'creador' => $creador, 'informe' => $informe, 'estimado' => $tiempo_estimado,'logueado' => $logueado]);
if(isset($_GET['respuesta'])){
  echo $twig->render('./templates/alert.html',['accion' => $accion, 'resultado' => $resultado]);
}
echo $twig->render('./templates/footer.html');}
}else{
  echo $twig->render('./templates/cabecera_oscura.html');
  echo $twig->render('./templates/404.html');
  echo $twig->render('./templates/footer.html');
}
?>
