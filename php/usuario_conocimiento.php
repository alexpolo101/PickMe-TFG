<?php

include '../sql/conexion.php';

if(isset($_POST['conocimiento-submit'])) {
  $eidusuario = $_POST['eidusuario'];
  $nuevoconocimiento = $_POST['nuevoconocimiento'];

  if (empty($eidusuario)){
    header("Location: ../profile.php?error=idnotdefined");
    exit();
  }
  else{
    $sql = "UPDATE users SET conocimiento=? WHERE idUsers = ?";

    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../profile.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ii", $nuevoconocimiento,$eidusuario);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../profile.php?update=success");
      exit();
    }
  }
}
