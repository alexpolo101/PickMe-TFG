<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './php/sesion.php';
include './sql/conexion.php';

$nombrepagina="Login";
$usuario="Email/username";
$alerta = false;
$accion = "";
$resultado = "";

if(isset($_GET['error'])){
  if($_GET['error']=='emptyfields'){
    $accion = "Error";
    $resultado = "Debe rellenar todos los campos";
  }elseif ($_GET['error']=='sqlerror'){
    $accion = "Error";
    $resultado = "Error en la base de datos";
  }elseif ($_GET['error']=='usernotfound'){
    $accion = "Error";
    $resultado = "El usuario no existe";
  }elseif ($_GET['error']=='passwordcheck'){
    $accion = "Error";
    $resultado = "Las dos contraseñas no coinciden, revise lo introducido";
  }elseif ($_GET['error']=='invalidmail'){
    $accion = "Error";
    $resultado = "El correo debe tener un formato correcto";
  }elseif ($_GET['error']=='wrongpwd'){
    $accion = "Error";
    $resultado = "Contraseña incorrecta";
  }

  $alerta = true;
}elseif (isset($_GET['signup'])) {
  $accion = "Registro";
  $resultado = "Se ha registrado correctamente, ahora puede identificarse";

  $alerta = true;
}

date_default_timezone_set('Europe/London');


echo $twig->render('./templates/login.html',['nombrepaginaa' => $nombrepagina]);
if($alerta){
  echo $twig->render('./templates/alert.html',['accion' => $accion, 'resultado' => $resultado]);
}

?>
