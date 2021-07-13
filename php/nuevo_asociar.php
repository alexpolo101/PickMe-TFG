<?php

include '../sql/conexion.php';

if(isset($_POST['asociar-submit'])) {
  $nombre_alt=$_POST['nombre_alt'];
  $url_alt= $_POST['url_alt'];
  $logo_alt= $_POST['logo_alt'];
  $idEncuesta= $_POST['idencuesta_alt'];
  $concreto= $_POST['nameencuesta_alt'];


  if (empty($nombre_alt) || empty($url_alt) || empty($logo_alt)){
    header("Location: ../nuevo.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "INSERT INTO alternativas (nameAlternativa, urlSitio, urlLogo, idEncuesta) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../nuevo.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ssss", $nombre_alt, $url_alt, $logo_alt, $idEncuesta);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../modificar.php?id=$idEncuesta&asociar=success&nombre=$concreto");
      exit();
    }
  }
}
