<?php

include '../sql/conexion.php';

if(isset($_POST['editarusuario-submit'])) {
  $idusuario = $_POST['idusuario'];
  $nuevonombre = $_POST['nuevonombre'];
  $nuevoemail = $_POST['nuevoemail'];
  $opcion = 0;

  if (empty($nuevonombre) && empty($nuevoemail) ){
    header("Location: ../profile.php?error=notdefinedchanges");
    exit();
  }
  else{
    if(empty($nuevonombre)){
      $opcion = 1;
      $sql = "UPDATE users SET emailUsers=? WHERE idUsers = ?";
    }else if (empty($nuevoemail)){
      $opcion = 2;
      $sql = "UPDATE users SET uidUsers=? WHERE idUsers = ?";
    }else{
      $opcion = 3;
      $sql = "UPDATE users SET uidUsers=?, emailUsers=? WHERE idUsers = ?";
    }

    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../profile.php?error=sqlerror");
      exit();
    }
    else{
      if($opcion==1){
        mysqli_stmt_bind_param($stmt, "si", $nuevoemail,$idusuario);
      }else if($opcion==2){
        mysqli_stmt_bind_param($stmt, "si", $nuevonombre,$idusuario);
      }else{
        mysqli_stmt_bind_param($stmt, "ssi", $nuevonombre,$nuevoemail,$idusuario);
      }
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../login.php?update=success&nuevon=$nuevonombre&nuevoemail=$nuevoemail&opcion=$opcion&idusuario=$idusuario");
      session_unset();
      session_destroy();
      exit();
    }
  }
}
