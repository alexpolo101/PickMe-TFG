<?php

include '../sql/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $idencuestado=$_POST['idencuestado'];
  $idtest=$_POST['idtest'];
  $idpick=$_POST['idpick'];
  $numpreguntas=$_POST['numpreguntas'];
  $numalternativas=$_POST['numalternativas'];



  if (empty($idpick) || empty($idtest)){
    header("Location: ../nuevo.php?error=emptyfields");
    exit();
  }
  else{
    $resultados[$numalternativas+1];

    $indice = 0;

    //Calculo SUS
    if($idtest==1){
    for($i = 1; $i <= $numpreguntas; $i++){
      for($j = 1; $j <= $numalternativas; $j++){
        $nom = 'respuesta_' . $i . '_' . $j;
        if($i % 2 == 0){
            $resultados[$j] = (5 - $_POST[$nom]) + $resultados[$j];
        }else{
            $resultados[$j] = ($_POST[$nom] - 1) + $resultados[$j];
        }
      }
    }

    for($j = 1; $j <= $numalternativas; $j++){
      $resultados[$j] = $resultados[$j] * 2.5;

      if($resultados[$j]<40){
        $elementos[$j] = "No aceptable";
      }elseif ($resultados[$j]>=40 && $resultados[$j]<60) {
        $elementos[$j] = "Marginal";
      }elseif ($resultados[$j]>=60 && $resultados[$j]<70) {
        $elementos[$j] = "Marginal tipo D";
      }elseif ($resultados[$j]>=70 && $resultados[$j]<75) {
        $elementos[$j] = "Aceptable tipo C";
      }elseif ($resultados[$j]>=75 && $resultados[$j]<80) {
        $elementos[$j] = "Aceptable tipo B";
      }else{
        $elementos[$j] = "Aceptable tipo A";
      }
    }

  //Calculo WAVE
  }elseif ($idtest==5) {
    for($i = 1; $i <= $numpreguntas; $i++){
      for($j = 1; $j <= $numalternativas; $j++){
        $nom = 'respuesta_' . $i . '_' . $j;
        if($i < 3){
            $resultados[$j] = (5/$i - ($_POST[$nom]*(0.025/$i))) + $resultados[$j];
        }else{
            //A mas de 15 features sumo el maximo
            if($_POST[$nom]<15){
            $resultados[$j] = ($_POST[$nom] * 0.167) + $resultados[$j];
          }else{
            $resultados[$j] = 2.5 + $resultados[$j];
          }
        }
      }
    }

    for($j = 1; $j <= $numalternativas; $j++){
      $resultados[$j] = $resultados[$j] * 10;

      if($resultados[$j]<15){
        $elementos[$j] = "Innacesible";
      }elseif ($resultados[$j]>=25 && $resultados[$j]<40) {
        $elementos[$j] = "Muy mejorable";
      }elseif ($resultados[$j]>=40 && $resultados[$j]<50) {
        $elementos[$j] = "Mejorable";
      }elseif ($resultados[$j]>=50 && $resultados[$j]<65) {
        $elementos[$j] = "Correcta";
      }elseif ($resultados[$j]>=65 && $resultados[$j]<75) {
        $elementos[$j] = "Buena";
      }else{
        $elementos[$j] = "Excepcional";
      }
    }
  }

    for($k = 1; $k <= $numalternativas; $k++){
      $arrayidalternativas[] = $_POST['idalternativa_' . $k];

      $sql = "INSERT INTO respuestas (idEncuesta,idTest,idUsers,idAlternativa,resultado,elementos) values (?,?,?,?,?,?)";

      $resultado = $conexion->query($sql);
      $stmt = mysqli_stmt_init($conexion);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../responder_inicio.php?error=sqlerror&id=$idpick");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "iiiids", $idpick, $idtest, $idencuestado,$arrayidalternativas[$k-1], $resultados[$k],$elementos[$k]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
      }
    }

    $sql = "UPDATE encuestas SET numencuestados=numencuestados+1 WHERE idEncuesta=?";

    $resultado = $conexion->query($sql);
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../responder_inicio.php?error=sqlerror&id=$idpick");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "i", $idpick);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
    }

    header("Location: ../responder_inicio.php?respuesta=registrada&id=$idpick");
    exit();

  }
}
