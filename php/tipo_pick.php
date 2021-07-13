<?php

include '../sql/conexion.php';

if(isset($_POST['tipopick-submit'])) {
  $id= $_POST['idpick'];
  $tipo= $_POST['tipo'];
  $nombre= $_POST['nombrepick'];

  if (empty($id) || empty($tipo) ){
    header("Location: ../modificar.php?error=notdefinedalt&id=$id&nombre=$nombre");
    exit();
  }
  else{
    $sql = "UPDATE encuestas SET typeEncuesta=? WHERE idEncuesta = ?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../modificar.php?error=sqlerror&id=$id&nombre=$nombre");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "si", $tipo,$id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../modificar.php?updatetipo=success&id=$id&nombre=$nombre");
      exit();
    }
  }
}
