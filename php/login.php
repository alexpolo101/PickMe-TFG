<?php

include '../sql/conexion.php';

if(isset($_POST['login-submit'])) {
  session_unset();
  session_destroy();
  
  $username=$_POST['mailuid'];
  $mailuid=$_POST['mailuid'];
  $password=$_POST['pwd'];

  if (empty($mailuid) || empty($password)){
    header("Location: ../login.php?error=emptyfields&mail=".$email);
    exit();
  }
  else{
    $sql = "SELECT * from users where uidUsers=? or emailUsers=?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if(mysqli_num_rows($result)!=1){
        header("Location: ../login.php?error=usernotfound");
        exit();
      }

      if($row = mysqli_fetch_assoc($result)) {
          $pwdCheck = password_verify($password, $row['pwdUsers']);
          if($pwdCheck == true) {
            session_start();
            $_SESSION['idUsers'] = $row['idUsers'];
            $_SESSION['uidUsers'] = $row['uidUsers'];
            $_SESSION['mail'] = $row['emailUsers'];
            $_SESSION['privilegio'] = $row['privilegio'];
            $_SESSION['conocimiento'] = $row['conocimiento'];
            header("Location: ../dashboard.php?login=success");
            exit();
          }
          else{
            header("Location: ../login.php?error=wrongpwd");
            exit();
          }
      }
    }
  }
}
