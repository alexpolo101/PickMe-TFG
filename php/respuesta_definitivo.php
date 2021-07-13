<?php

include '../sql/conexion.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
  $idencuestado=$_POST['idencuestado'];
  $idtest=$_POST['idtest'];
  $idpick=$_POST['idpick'];
  $numpreguntas=$_POST['numpreguntas'];
  $numalternativas=$_POST['numalternativas'];
  $tags=$_POST['numtags'];
  $rol=$_POST['rol'];

  if (empty($idpick) || empty($idtest)){
    header("Location: ../respuesta_inicio.php?error=emptyfields");
    exit();
  }
  else{
    $resultados[$numalternativas+1];
    $ponderacion[$numalternativas+1];

    $indice = 0;

    //Calculo Usabilidad
    if($idtest==2 || $idtest==3 || $idtest==4){

      for($i = 1; $i <= $numpreguntas; $i++){
        for($j = 1; $j <= $numalternativas; $j++){
          $nom = 'respuesta_' . $i . '_' . $j;
          if($i==1 || $i==2 || $i==12 || $i==34){
              $resultados[$j] = ($_POST[$nom] * (1.0)) + $resultados[$j];
              $ponderacion[$j] = $ponderacion[$j] + $tags;
          }elseif($i==3 || $i==7 || $i==10 || $i==14 || $i==18 || $i==19 || $i==21 || $i==22 || $i==30 || $i==36 || $i==39 || $i == 43 || $i == 44){
              $resultados[$j] = ($_POST[$nom] * (1.0-(1.0/5)*1)) + $resultados[$j];
              $ponderacion[$j] = $ponderacion[$j] + ($tags-($tags/5)*1);
          }elseif($i==4 || $i==5 || $i==6 || $i==8 || $i==11 || $i==13 || $i==23 || $i==25 || $i==28 || $i==29 || $i==31 || $i==32 || $i==33 || $i==37 || $i==38 || $i==40 || $i==41 || $i==45){
              $resultados[$j] = ($_POST[$nom] * (1.0-(1.0/5)*2)) + $resultados[$j];
              $ponderacion[$j] = $ponderacion[$j] + ($tags-($tags/5)*2);
          }elseif($i==9 || $i==15 || $i==16 || $i==20 || $i==26 || $i==27 || $i==35 || $i==42){
              $resultados[$j] = ($_POST[$nom] * (1.0-(1.0/5)*3)) + $resultados[$j];
              $ponderacion[$j] = $ponderacion[$j] + ($tags-($tags/5)*3);
          }elseif($i==17 || $i==24){
              $resultados[$j] = ($_POST[$nom] * (1.0-(1.0/5)*4)) + $resultados[$j];
              $ponderacion[$j] = $ponderacion[$j] + ($tags-($tags/5)*4);
          }
        }
      }

      for($j = 1; $j <= $numalternativas; $j++){
          $resultados[$j] = $resultados[$j] / $ponderacion[$j];
      }

      for($j = 1; $j <= $numalternativas; $j++){
        $resultados[$j] = $resultados[$j] * 100;

        if($resultados[$j]<29){
          $elementos[$j] = "Muy pobre";
        }elseif ($resultados[$j]>=29 && $resultados[$j]<49) {
          $elementos[$j] = "Pobre";
        }elseif ($resultados[$j]>=49 && $resultados[$j]<69) {
          $elementos[$j] = "Moderada";
        }elseif ($resultados[$j]>=69 && $resultados[$j]<89) {
          $elementos[$j] = "Buena";
        }else{
          $elementos[$j] = "Excelente";
        }
      }
      //Calculo SUS
    }elseif($idtest==1){
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
  //Calculo NPS
  }elseif ($idtest==9) {
  for($i = 1; $i <= $numpreguntas; $i++){
    for($j = 1; $j <= $numalternativas; $j++){
      $nom = 'respuesta_' . $i . '_' . $j;
      $resultados[$j] = $_POST[$nom] + $resultados[$j];
    }
  }
  //Calculo Contraste y test nuevos
  }else{
    for($i = 1; $i <= $numpreguntas; $i++){
      for($j = 1; $j <= $numalternativas; $j++){
        $nom = 'respuesta_' . $i . '_' . $j;
        $resultados[$j] = ($_POST[$nom] * (1.0)) + $resultados[$j];
        $ponderacion[$j] = $ponderacion[$j] + $tags;
      }
    }

    for($j = 1; $j <= $numalternativas; $j++){
      $resultados[$j] = $resultados[$j] / $ponderacion[$j];
    }

    for($j = 1; $j <= $numalternativas; $j++){
      $resultados[$j] = $resultados[$j] * 100;

      if($resultados[$j]<35){
        $elementos[$j] = "Muy pobre";
      }elseif ($resultados[$j]>=35 && $resultados[$j]<53) {
        $elementos[$j] = "Pobre";
      }elseif ($resultados[$j]>=53 && $resultados[$j]<70) {
        $elementos[$j] = "Moderada";
      }elseif ($resultados[$j]>=70 && $resultados[$j]<88) {
        $elementos[$j] = "Buena";
      }else{
        $elementos[$j] = "Excelente";
      }
    }
}



    for($k = 1; $k <= $numalternativas; $k++){
      //Si es NPS lo cambio de escala
      if($idtest==9){
        $resultados[$k] = $resultados[$k] * 10;
      }

      $arrayidalternativas[] = $_POST['idalternativa_' . $k];

      $sql = "INSERT INTO respuestas (idEncuesta,idTest,idUsers,idAlternativa,resultado,elementos,rol) values (?,?,?,?,?,?,?)";

      $resultado = $conexion->query($sql);
      $stmt = mysqli_stmt_init($conexion);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../responder_inicio.php?error=sqlerror&id=$idpick");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "iiiidss", $idpick, $idtest, $idencuestado,$arrayidalternativas[$k-1], $resultados[$k],$elementos[$k],$rol);
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
