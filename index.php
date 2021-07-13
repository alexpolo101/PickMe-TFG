<?php require_once './TWIG/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader, []);

include './sql/conexion.php';

date_default_timezone_set('Europe/London');

echo $twig->render('./templates/index.html');
echo $twig->render('./templates/footer.html');

?>
