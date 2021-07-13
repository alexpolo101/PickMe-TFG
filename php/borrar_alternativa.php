<?php

include '../sql/conexion.php';

if(isset($_POST['borraralt-submit'])) {
  $idalt= $_POST['idalternativa'];
  $nombre = $_POST['nombrepick'];

  if (empty($nombre) || empty($idalt) ){
    header("Location: ../modificar.php?error=notdefinedalt&nombre=$nombre");
    exit();
  }
  else{
    $sql = "DELETE from alternativas WHERE idAlternativa = ?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../modificar.php?error=sqlerror&nombre=$nombre");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "i", $idalt);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../modificar.php?eliminaralt=success&nombre=$nombre");
      exit();
    }
  }
}
