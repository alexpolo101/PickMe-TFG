<?php

    $conexion = mysqli_connect('localhost', 'root', '', "pickme");
    if(!$conexion){
                die ('No se pudo abrir la base de datos. ERROR: ' . mysql_error());
            }


 ?>
