<?php

include '../sql/conexion.php';

if(isset($_POST['et-submit'])) {
  $idpick= $_POST['idpick'];
  $nombrepick= $_POST['nombrepick'];
  $size = $_POST['size'] - 1;

  if (empty($idpick) || empty($nombrepick) || empty($size)){
    header("Location: ../modificar.php?error=emptyfields&id=$idpick&nombre=$nombrepick");
    exit();
  }
  else{

  for ($i = 1; $i <= $size; $i++) {
    $tipo = "tipo" . $i;

    if (isset($_POST[$tipo])){
      $sql = "INSERT INTO encuestastests (idEncuesta,idTest) VALUES (?, ?)";
      $stmt = mysqli_stmt_init($conexion);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../modificar.php?error=sqlerror&id=$idpick&nombre=$nombrepick");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "ii", $idpick, $i);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
      }
    }
    elseif (empty($_POST[$tipo])){
      $sql = "DELETE from encuestastests WHERE idEncuesta = ? and idTest = ?";
      $stmt = mysqli_stmt_init($conexion);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../modificar.php?error=sqlerror&id=$idpick&nombre=$nombrepick");
        exit();
      }else{
        mysqli_stmt_bind_param($stmt, "ii", $idpick, $i);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
      }
    }
   }
   header("Location: ../modificar.php?success=asociartests&id=$idpick&nombre=$nombrepick");
   exit();
  }
}
