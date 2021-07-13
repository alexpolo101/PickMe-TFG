<?php

include '../sql/conexion.php';

if(isset($_POST['crear-submit'])) {
  $nombre=$_POST['nombre'];
  $descripcion=$_POST['descripcion'];
  $tipo=$_POST['tipo'];
  $idetiqueta= $_POST['etiquetaopcion'];
  $existe = false;
  $max = -1;


  if (empty($nombre) || empty($tipo) || empty($idetiqueta)){
    header("Location: ../nuevo_test.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "SELECT nameTest FROM tests";

    $resultado = $conexion->query($sql);

    while( ($fila=$resultado->fetch_assoc()) && !$existe) {
        $existe = ($fila['nameTest']==$nombre);
    }

    if($existe){
      header("Location: ../nuevo_test.php?error=nombreyaexiste");
      exit();
    }else{
    $sql = "SELECT max(idTest)+1 as maximo FROM tests";
    $resultado = $conexion->query($sql);

    $fila = $resultado->fetch_row();
    $max = $fila[0];
    print ($max);


    $sql = "INSERT INTO tests (idTest, nameTest, descripcionTest, tipoTest, idEtiqueta) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../nuevo_test.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "isssi", $max, $nombre, $descripcion, $tipo, $idetiqueta);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $sql = "INSERT INTO testsetiquetas (idTest, idEtiqueta) VALUES ($max, $idetiqueta)";
      $resultado = $conexion->query($sql);

      header("Location: ../importar.php?creacion=success&idtest=$max");
      exit();
    }
  }
  }
}
