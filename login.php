<?php require_once './Twig/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

//include './php/sesion.php';
//include './sql/conexion.php';

$nombrepagina="Login";
$usuario="Email/username";
//if (isset($_SESSION['userUid'])){
//  $usuario=$_SESSION['userUid'];
//}
//error_reporting(E_ALL ^ E_WARNING);

//if (isset($_SESSION['userId'])) {
//  $userUid = $_SESSION['userUid'];
//  $mail= $_SESSION['mail'];
//  $privilegio= $_SESSION['privilegio'];

//  echo $twig->render('./templates/cabecera.html',['nombre' => $nombrepagina, 'usuario' => $usuario]);
//  echo $twig->render('./templates/barralateral.html');
//  echo $twig->render('./templates/actualizaperfil.html',['useractual' => $userUid, 'mailactual' => $mail]);
//  if ($_SESSION['privilegio'] > 3){
//    include './sql/obtencion_usuarios.php';
//    getUsers($conexion);
//    echo $twig->render('./templates/editarprivilegio.html',['usuarios' => $usuarios]);
//    include './allcomments.php';
//  }
//  echo $twig->render('./templates/piePagina.html');
//  include './php/actualizaperfil.php';
//}
//else{


//$error=null;
//$success=null;


date_default_timezone_set('Europe/London');


echo $twig->render('./login.html',['nombre' => $nombrepagina]);

//include './php/signup.php';

?>
