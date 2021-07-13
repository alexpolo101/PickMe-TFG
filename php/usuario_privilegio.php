<?php

include '../sql/conexion.php';

if(isset($_POST['privilegio-submit'])) {
  $eidusuario = $_POST['eidusuario'];
  $nuevoprivilegio = $_POST['nuevoprivilegio'];

  if (empty($eidusuario)){
    header("Location: ../gestion.php?error=idnotdefined");
    exit();
  }
  else{
    $sql = "UPDATE users SET privilegio=? WHERE idUsers = ?";

    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../gestion.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ii", $nuevoprivilegio,$eidusuario);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../gestion.php?update=success");
      exit();
    }
  }
}
