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
    for($i = 1; $i <= $numpreguntas; $i++){
      for($j = 1; $j <= $numalternativas; $j++){
        $nom = 'respuesta_' . $i . '_' . $j;
        $resultados[$j] = $_POST[$nom] + $resultados[$j];
      }
    }


    for($k = 1; $k <= $numalternativas; $k++){
      //Si es NPS lo cambio de escala
      if($idtest==9){
        $resultados[$k] = $resultados[$k] * 10;
      }


      $arrayidalternativas[] = $_POST['idalternativa_' . $k];

      $sql = "INSERT INTO respuestas (idEncuesta,idTest,idUsers,idAlternativa,resultado) values (?,?,?,?,?)";

      $resultado = $conexion->query($sql);
      $stmt = mysqli_stmt_init($conexion);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../responder_inicio.php?error=sqlerror&id=$idpick");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "iiiii", $idpick, $idtest, $idencuestado,$arrayidalternativas[$k-1], $resultados[$k]);
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
