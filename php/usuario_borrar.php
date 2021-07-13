<?php

include '../sql/conexion.php';

if(isset($_POST['borrarusuario-submit'])) {
  $idusuario= $_POST['idusuario'];

  if (empty($idusuario) ){
    header("Location: ../profile.php?error=notdefineduser&idusuario=$idusuario");
    exit();
  }
  else{
    $sql = "DELETE from users WHERE idUsers = ?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../profile.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "i", $idusuario);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../index.php?eliminarusuario=success");
      session_unset();
      session_destroy();
      exit();
    }
  }
}
