<?php

include '../sql/conexion.php';

if(isset($_POST['signup-submit'])) {
  $username=$_POST['uid'];
  $email=$_POST['mail'];
  $password=$_POST['pwd'];
  $passwordRepeat=$_POST['pwd-repeat'];

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
    header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username))){
    header("Location: ../register.php?error=invalidmailuid");
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../register.php?error=invalidmail&uid=".$username);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../register.php?error=invaliduid&mail=" .$email);
    exit();
  }
  else if ($password !== $passwordRepeat){
    header("Location: ../register.php?error=passwordcheck&uid=" .$username."&mail=".$email);
    exit();
  }

  else{
    $sql = "SELECT uidUsers from users where uidUsers=?";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../register.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);

      if($resultCheck > 0){
        header("Location: ../register.php?error=usertaken&mail=" .$email);
        exit();
      }
      else{
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conexion);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../register.php?error=sqlerror");
          exit();
        }
        else{
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          session_start();
          $_SESSION['idUsers'] = $row['idUsers'];
          $_SESSION['uidUsers'] = $row['uidUsers'];
          $_SESSION['mail'] = $row['emailUsers'];
          $_SESSION['privilegio'] = $row['privilegio'];
          $_SESSION['conocimiento'] = $row['conocimiento'];
          header("Location: ../login.php?signup=success");
          exit();
        }
      }
    }
  }
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
  }
