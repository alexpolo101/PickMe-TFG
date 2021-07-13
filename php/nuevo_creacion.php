<?php

include '../sql/conexion.php';

if(isset($_POST['crear-submit'])) {
  $nombre=$_POST['nombre'];
  $tipo=$_POST['tipo'];
  $tamanio= 0;
  $numencuestados=$_POST['numencuestados'];
  $creador=$_POST['creador'];
  $existe = false;

  if(isset($_POST['checkbox'])){
    $visible = 1;
  }else{
    $visible = 0;
  }

  $enlace= "./pickme.php/" . $nombre;


  if (empty($nombre) || empty($tipo)){
    header("Location: ../nuevo.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "SELECT nameEncuesta FROM encuestas";

    $resultado = $conexion->query($sql);

    while( ($fila=$resultado->fetch_assoc()) && !$existe) {
        $existe = ($fila['nameEncuesta']==$nombre);
    }

    if($existe){
      header("Location: ../nuevo.php?error=nombreyaexiste");
      exit();
    }else{

    $sql = "INSERT INTO encuestas (nameEncuesta, typeEncuesta, sizeEncuesta, numencuestados, visible, creador) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../nuevo.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ssiiis", $nombre, $tipo, $tamanio, $numencuestados, $visible, $creador);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../modificar.php?creacion=success&nombre=$nombre");
      exit();
    }
  }
  }
}
