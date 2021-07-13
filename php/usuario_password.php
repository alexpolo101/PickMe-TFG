<?php

include '../sql/conexion.php';

if(isset($_POST['passwordusuario-submit'])) {
  $idusuario = $_POST['idusuario'];
  $nuevopassword=$_POST['nuevopwd'];
  $nuevopasswordRepeat=$_POST['nuevopwd-repeat'];

  if (empty($nuevopassword)||empty($nuevopasswordRepeat) ){
    header("Location: ../profile.php?error=notdefinedpassword");
    exit();
  } else if ($nuevopassword != $nuevopasswordRepeat){
    header("Location: ../profile.php?error=nomatchpassword");
    exit();
  }
  else{
    $sql = "UPDATE users SET pwdUsers=? WHERE idUsers = ?";

    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../profile.php?error=sqlerror");
      exit();
    }
    else{
      $hashedPwd = password_hash($nuevopassword, PASSWORD_DEFAULT);

      mysqli_stmt_bind_param($stmt, "si", $hashedPwd,$idusuario);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      header("Location: ../login.php?updatepassword=success");
      session_unset();
      session_destroy();
      exit();
    }
  }
}
