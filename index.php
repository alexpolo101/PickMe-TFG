<?php require_once './Twig/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

// include './php/sesion.php';
include './sql/conexion.php';

// $tipoevento="principal";
// $nombrepagina="E-Sports info";
// $usuario="Email/username";
// $privilegio='0';

// if (isset($_SESSION['userUid'])){
//   $usuario=$_SESSION['userUid'];
//   $privilegio=$_SESSION['privilegio'];
// }

// if (isset($_GET['evento'])) {
//   include './evento.php';
// }
// else{
// include './sql/obtencion_evento.php';

// getTodos($conexion,$privilegio);
date_default_timezone_set('Europe/London');


//echo $twig->render('../index.html',['nombre' => $nombrepagina, 'usuario' => $usuario]);
echo $twig->render('./index.html');
echo $twig->render('./footer.html');
//echo $twig->render('./templates/grid.html',['todos' => $todos]);
//if (isset($_SESSION['privilegio'])){
//  if ($_SESSION['privilegio'] > '2'){
//      echo $twig->render('./templates/aniadirevento.html');
//  }
//}
//echo $twig->render('./templates/piePagina.html');
//include './comments.php';
//}
?>
