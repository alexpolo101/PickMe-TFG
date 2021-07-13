<?php

include '../sql/conexion.php';

if(isset($_POST['duplicarpick-submit'])) {
  $id= $_POST['id'];
  $nombre = $_POST['nombre'];

  if (empty($nombre)){
    header("Location: ../modificar.php?error=notdefinedalt&id=$id&nombre=$nombre");
    exit();
  }
  else{
    $sql = "SELECT * FROM encuestas where idEncuesta=$id";
    $result = $conexion->query($sql);

    while($row = $result->fetch_assoc()) {
        $tipo = $row["typeEncuesta"];
        $size = $row["sizeEncuesta"];
        $num = $row["numencuestados"];
        $visible = $row["visible"];
        $creador = $row["creador"];
    }

    $nombrenuevo = $nombre . "_copia";

    $result->free();
    $conexion->next_result();

    $sql = "INSERT INTO encuestas (nameEncuesta,typeEncuesta,sizeEncuesta,numencuestados,visible,creador) values (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conexion);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../modificar.php?error=sqlerror&id=$id&nombre=$nombre");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ssiiii",$nombrenuevo,$tipo,$size,$num,$visible,$creador);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $sql = "SELECT idEncuesta from encuestas where nameEncuesta=?";
      $stmt = mysqli_stmt_init($conexion);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../modificar.php?error=sqlerror&id=$id&nombre=$nombre");
        exit();
      }
      else{
        mysqli_stmt_bind_param($stmt, "s",$nombrenuevo);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($fila = mysqli_fetch_array($result, MYSQLI_NUM)){
            foreach ($fila as $f){
                $idnuevo = $f;
            }
        }

        $sql = "INSERT INTO alternativas (nameAlternativa,urlSitio,urlLogo,idEncuesta) SELECT a.nameAlternativa,a.urlSitio,a.urlLogo,b.idEncuesta from alternativas a, encuestas b where a.idEncuesta=? and b.idEncuesta=?;";
        $stmt = mysqli_stmt_init($conexion);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../modificar.php?duplicar=successnoalternativas&id=$idnuevo&nombre=$nombrenuevo");
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt, "ii",$id,$idnuevo);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

        header("Location: ../modificar.php?duplicar=success&id=$idnuevo&nombre=$nombrenuevo");
        exit();
      }
    }
  }
  }
}
