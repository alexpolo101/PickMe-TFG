<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

$nombrepagina="Registro";
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
  }elseif ($_GET['error']=='wrongpwd'){
    $accion = "Error";
    $resultado = "Contraseña incorrecta";
  }elseif ($_GET['error']=='usertaken'){
    $accion = "Error";
    $resultado = "El nombre de usuario ya existe en la plataforma";
  }elseif ($_GET['error']=='invaliduid'){
    $accion = "Error";
    $resultado = "El nombre de usuario no puede incluir caracteres especiales";
  }elseif ($_GET['error']=='invalidmailuid'){
    $accion = "Error";
    $resultado = "El correo electrónico o el nombre de usuario incluyen caracteres no permitidos";
  }elseif ($_GET['error']=='invalidmail'){
    $accion = "Error";
    $resultado = "El correo electrónico debe tener un formato correcto";
  }elseif ($_GET['error']=='passwordcheck'){
    $accion = "Error";
    $resultado = "Las dos contraseñas no coinciden, revise lo introducido";
  }

  $alerta = true;
}

date_default_timezone_set('Europe/London');


echo $twig->render('./templates/register.html',['nombrepagina' => $nombrepagina]);
if($alerta){
  echo $twig->render('./templates/alert.html',['accion' => $accion, 'resultado' => $resultado]);
}

?>
