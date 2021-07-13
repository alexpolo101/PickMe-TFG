<?php

include '../sql/conexion.php';

if(isset($_POST['borrarpick-submit'])) {
  $id= $_POST['id'];
  $nombre = $_POST['nombre'];

  if (empty($nombre)){
    header("Location: ../modificar.php?error=notdefinedalt&id=$id&nombre=$nombre");
    exit();
  }
  else{
    $sql = "DELETE from alternativas WHERE idEncuesta = ?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../modificar.php?error=sqlerror&id=$id&nombre=$nombre");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $sql = "DELETE from encuestas WHERE idEncuesta = ?";
      $stmt = mysqli_stmt_init($conexion);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../modificar.php?error=sqlerror&id=$id&nombre=$nombre");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        header("Location: ../dashboard.php?borrarpick=success");
        exit();
    }
  }
 }
}
