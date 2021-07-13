<?php

include '../sql/conexion.php';

  $tests=$_GET['id'];
  $ruta= $_GET['archivo'];
  $archivo= fopen("$ruta","r");
  $multiples = false;

  if (empty($tests) || empty($archivo)){
    header("Location: ../importar.php?error=emptyfields");
    exit();
  }
  else{
    if($tests==2 || $tests==6){
      $multiples = true;
    }
    if(!$multiples){
      $sql = "DELETE FROM preguntas WHERE idTest=$tests";
    }else{
      $sql = "DELETE FROM preguntas WHERE idTest=$tests or idTest=($tests+1) or idTest=($tests+2)";
    }

    $result = $conexion->query($sql);

    while ($line = fgets($archivo)){
        if(!$multiples){
          $sql = "INSERT INTO preguntas (idTest,texto) values ($tests,'$line')";
          $result = $conexion->query($sql);
        }else{
          $sql = "INSERT INTO preguntas (idTest,texto) values ($tests,'$line')";
          $result = $conexion->query($sql);
          $sql = "INSERT INTO preguntas (idTest,texto) values ($tests+1,'$line')";
          $result = $conexion->query($sql);
          $sql = "INSERT INTO preguntas (idTest,texto) values ($tests+2,'$line')";
          $result = $conexion->query($sql);
        }
    }

    fclose($archivo);

    header("Location: ../importar.php?importar=success");
    exit();
  }
