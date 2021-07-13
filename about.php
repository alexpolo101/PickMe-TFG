<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

//include './php/sesion.php';
//include './sql/conexion.php';

$nombrepagina="Sobre Nosotros";
$usuario="Email/username";



date_default_timezone_set('Europe/London');

echo $twig->render('./templates/cabecera.html');
echo $twig->render('./templates/about.html',['nombre' => $nombrepagina]);
echo $twig->render('./templates/footer.html');

//include './php/signup.php';

?>
