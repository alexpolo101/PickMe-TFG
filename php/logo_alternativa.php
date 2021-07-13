<?php

include '../sql/conexion.php';

if(isset($_POST['logoalt-submit'])) {
  $idalt= $_POST['idalternativa'];
  $nombrealt= $_POST['nombrealt'];
  $nombre = $_POST['nombrepick'];
  $nuevologo = $_POST['nuevologo'];

  if (empty($nuevologo) || empty($idalt) ){
    header("Location: ../modificar_alternativa.php?error=notdefinedalt&idalt=$idalt&namealt=$nombrealt&nombrepick=$nombre");
    exit();
  }
  else{
    $sql = "UPDATE alternativas SET urlLogo=? WHERE idAlternativa = ?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../modificar_alternativa.php?error=sqlerror&idalt=$idalt&namealt=$nombrealt&nombrepick=$nombre");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "si", $nuevologo,$idalt);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../modificar_alternativa.php?updatelogo=success&&idalt=$idalt&namealt=$nuevonombre&nombrepick=$nombre");
      exit();
    }
  }
}
