<?php

include '../sql/conexion.php';

if(isset($_POST['invisiblepick-submit'])) {
  $id= $_POST['idpick'];
  $nombre= $_POST['nombrepick'];
  $visibilidad = 0;

  if (empty($id)){
    header("Location: ../modificar.php?error=notdefinedalt&id=$id&nombre=$nombre");
    exit();
  }
  else{
    $sql = "UPDATE encuestas SET visible=? WHERE idEncuesta = ?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../modificar.php?error=sqlerror&id=$id&nombre=$nombre");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ii", $visibilidad,$id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../modificar.php?updateinvisibilidad=success&id=$id&nombre=$nombre");
      exit();
    }
  }
}
