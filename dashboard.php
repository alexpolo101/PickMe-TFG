<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';
include './sql/info_pickme.php';

$nombrepagina="Dashboard";
$usuario="username";
$privilegio= 0;
$idusuario='-1';
$logueado = false;
$ultimo = -1;
$porcentaje = 0;

$creados = 0;
$respondidas = 0;

$nsus = 0;
$nus = 0;
$nwave = 0;
$ncon = 0;
$nnps = 0;
$totales = 0;

if (isset($_SESSION['uidUsers'])){
  $usuario= $_SESSION['uidUsers'];
  $privilegio = $_SESSION['privilegio'];
  $idusuario = $_SESSION['idUsers'];
  $logueado = true;

  $creados = getCreados($conexion,$_SESSION['idUsers']);
  $respondidas = getRespondidas($conexion,$_SESSION['idUsers']);
  getTusPickME($conexion,$idusuario);
  $totales = getTotales($conexion);

  if ($totales > 0) {
    $nsus = getDonut($conexion,'1');
    $nus = getDonut($conexion,'2');
    $nus = $nus + getDonut($conexion,'3');
    $nus = $nus + getDonut($conexion,'4');
    $nwave = getDonut($conexion,'5');
    $nwave = $nwave + getDonut($conexion,'6');
    $nwave = $nwave + getDonut($conexion,'7');
    $ncon = getDonut($conexion,'8');
    $ncon = $ncon + getDonut($conexion,'9');
    $ncon = $ncon + getDonut($conexion,'10');
    $nnps = getDonut($conexion,'11');
  }

  if (!empty($tuyos)) {
    getTusPickMEOrdenados($conexion,$idusuario);
    $ultimo = getUltimoPickME($conexion,$idusuario);
    if($ultimo!=-1){
      getTusTest($conexion,$ultimo);
      getNombreTest($conexion,$ultimo,$tuyos_tests);
      getYaRespondidas($conexion,$idusuario,$ultimo);
      if($respondidas_tests != null){
        $porcentaje = (count($respondidas_tests)/count($nombres_tests)) * 100;
      }
    }
  }else{
    $maximos = null;
  }
}


date_default_timezone_set('Europe/London');

$dash = true;
$perf = false;
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

if($logueado){
echo $twig->render('./templates/barra_lateral.html',['dash' => $dash, 'perf' => $perf, 'cole' => $cole, 'cre' => $cre,'administrador' => $administrador,'gest' => $gest,'imp' => $imp,'tst' => $tst]);
echo $twig->render('./templates/dashboard.html',['nombre' => $nombrepagina, 'usertop' => $usuario, 'creados' => $creados, 'respondidas' => $respondidas, 'tuyos' => $tuyos,'nsus' => $nsus,'nus' => $nus,'nwave' => $nwave,'ncon' => $ncon,'nnps' => $nnps,'maximos' => $maximos, 'ultimo' => $ultimo,'porcentaje' => $porcentaje]);
}else{
  echo $twig->render('./templates/cabecera_oscura.html');
  echo $twig->render('./templates/404.html');
  echo $twig->render('./templates/footer.html');
}



?>
