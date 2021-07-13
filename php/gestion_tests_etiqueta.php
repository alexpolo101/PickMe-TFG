<?php

include '../sql/conexion.php';

if(isset($_POST['etiqueta-submit'])) {
  $idtest = $_POST['idTest'];
  $idetiqueta = $_POST['etiquetaopcion'];

  if (empty($idtest) || empty($idetiqueta)){
    header("Location: ../gestion_tests.php?error=idnotdefined");
    exit();
  }
  else{
    $sql = "UPDATE testsetiquetas SET idEtiqueta=? WHERE idTest = ?";

    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../gestion_tests.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ii", $idetiqueta,$idtest);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../gestion_tests.php?update=success");
      exit();
    }
  }
}
