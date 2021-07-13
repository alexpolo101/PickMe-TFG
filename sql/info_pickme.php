<?php

function getCreados($conexion,$idcreador) {
    $sql = "SELECT count(*) FROM encuestas where creador = $idcreador";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return (int) $fila[0];
}

function getTotales($conexion) {
    $sql = "SELECT count(*) FROM encuestas";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return (int) $fila[0];
}

function getEtiqueta($conexion,$idtest) {
    $sql = "SELECT idEtiqueta FROM testsetiquetas where idTest=$idtest";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return (int) $fila[0];
}

function getNumTags($conexion,$idtag) {
    $sql = "SELECT numValores FROM etiquetas where idEtiqueta=$idtag";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return (int) $fila[0];
}

function getRespondidas($conexion,$idcreador) {
    $sql = "SELECT numencuestados FROM encuestas where creador = $idcreador";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();

    if(isset($fila)){
      return (int) $fila[0];
    }else{
      return 0;
    }
}

function getPickMEid($conexion,$nombre) {
    $sql = "SELECT idEncuesta FROM encuestas where nameEncuesta = '$nombre'";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return (int) $fila[0];
}

function getPickMEvisibilidad($conexion,$id) {
    $sql = "SELECT visible FROM encuestas where idEncuesta = $id";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return (int) $fila[0];
}

function getPickMEname($conexion,$idencuesta) {
    $sql = "SELECT nameEncuesta FROM encuestas where idEncuesta = $idencuesta";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return $fila[0];
}

function getPickMEcreador($conexion,$idencuesta) {
    $sql = "SELECT uidUsers FROM encuestas,users where idEncuesta = $idencuesta and users.idUsers=encuestas.creador;";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return $fila[0];
}

function getUsername($conexion,$iduser) {
    $sql = "SELECT uidUsers FROM users where idUsers = $iduser";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return $fila[0];
}

function getConocimiento($conexion,$iduser) {
    $sql = "SELECT conocimiento FROM users where idUsers = $iduser";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return $fila[0];
}

function getUltimoPickME($conexion,$idcreador) {
    $sql = "SELECT idEncuesta FROM encuestas WHERE fecha=(SELECT MAX(fecha) FROM encuestas WHERE creador=$idcreador);";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return (int) $fila[0];
}

function getTusPickME($conexion,$idusuario){
    $sql = "SELECT * FROM encuestas where creador=$idusuario";

    $result = $conexion->query($sql);
    global $tuyos;
    while($row = $result->fetch_assoc()) {
        $tuyos[] = $row;
    }
}

function getTusPickMEOrdenados($conexion,$idusuario){
    $sql = "SELECT * FROM encuestas where creador=$idusuario order by numencuestados DESC LIMIT 5";

    $result = $conexion->query($sql);
    global $maximos;
    while($row = $result->fetch_assoc()) {
        $maximos[] = $row;
    }
}

function getTusTest($conexion,$idpick){
    $sql = "SELECT * FROM encuestastests where idEncuesta=$idpick";

    $result = $conexion->query($sql);
    global $tuyos_tests;
    while($row = $result->fetch_assoc()) {
        $tuyos_tests[] = $row;
    }
}

function getNombreTest($conexion,$idpick,$lista){
    global $nombres_tests;

    if($lista!= NULL){
    for ($i = 0; $i < count($lista); $i++) {
      $elemento = $lista[$i]['idTest'];
      $sql = "SELECT * FROM tests where idTest=$elemento";

      $result = $conexion->query($sql);
      while($row = $result->fetch_assoc()) {
        if (strpos($row['nameTest'],'pequeno') !== false) {
          $row['nameTest'] = str_replace('pequeno', '', $row['nameTest']);
        }elseif(strpos($row['nameTest'],'mediano') !== false) {
          $row['nameTest'] = str_replace('mediano', '', $row['nameTest']);
        }elseif(strpos($row['nameTest'],'grande') !== false) {
          $row['nameTest'] = str_replace('grande', '', $row['nameTest']);
        }

        $nombres_tests[] = $row;
      }
    }
  }
}

function getYaRespondidas($conexion,$iduser,$idpick){
  global $respondidas_tests;

  if($iduser!=0){
    $sql = "SELECT DISTINCT idEncuesta,idTest FROM respuestas where idUsers=$iduser and idEncuesta=$idpick";

    $result = $conexion->query($sql);
    while($row = $result->fetch_assoc()) {
        $respondidas_tests[] = $row;
    }
  }
}

function getAlternativas($conexion,$idconcreto){
    $sql = "SELECT * FROM alternativas where idEncuesta=$idconcreto";

    $result = $conexion->query($sql);
    global $alternativas;
    while($row = $result->fetch_assoc()) {
        $alternativas[] = $row;
    }
}

function getListaPickME($conexion,$privilegio,$limit,$offset,$paginado,$by,$modo){
    if($paginado){
      if($privilegio > 1){
          $sql = "SELECT *,DATE_FORMAT(DATE(fecha), '%D %M %Y') AS ffecha FROM encuestas ORDER BY $by $modo LIMIT $limit OFFSET $offset";
        }else{
          $sql = "SELECT *,DATE_FORMAT(DATE(fecha), '%D %M %Y') AS ffecha FROM encuestas where visible=1 ORDER BY $by $modo LIMIT $limit OFFSET $offset";
        }
    }else{
      if($privilegio > 1){
          $sql = "SELECT *,DATE_FORMAT(DATE(fecha), '%D %M %Y') AS ffecha FROM encuestas ORDER BY $by $modo";
        }else{
          $sql = "SELECT *,DATE_FORMAT(DATE(fecha), '%D %M %Y') AS ffecha FROM encuestas where visible=1 ORDER BY $by $modo";
        }
    }


    $result = $conexion->query($sql);
    global $todos;
    while($row = $result->fetch_assoc()) {
        $todos[] = $row;
    }
}

function getListaAlternativas($conexion){

    $sql = "SELECT * FROM alternativas";

    $result = $conexion->query($sql);
    global $todos_alternativas;
    while($row = $result->fetch_assoc()) {
        $todos_alternativas[] = $row;
    }
}

function getListaTests($conexion){

    $sql = "SELECT * FROM tests";

    $result = $conexion->query($sql);
    global $todos_tests;
    while($row = $result->fetch_assoc()) {
        $todos_tests[] = $row;
    }
}

function getListaTestsEtiquetas($conexion,$by,$modo){

    $sql = "SELECT tests.idTest,nameTest,descripcionTest,nameEtiqueta,numValores FROM testsetiquetas,tests,etiquetas where tests.idTest=testsetiquetas.idTest and testsetiquetas.idEtiqueta=etiquetas.idEtiqueta ORDER BY $by $modo";

    $result = $conexion->query($sql);
    global $listatests;
    while($row = $result->fetch_assoc()) {
        $listatests[] = $row;
    }
}

function getListaEtiquetas($conexion){

    $sql = "SELECT * FROM etiquetas ORDER BY idEtiqueta DESC";

    $result = $conexion->query($sql);
    global $listaetiquetas;
    while($row = $result->fetch_assoc()) {
        $listaetiquetas[] = $row;
    }
}

function getAlternativaUrlSitio($conexion,$idalternativa) {
    $sql = "SELECT urlSitio FROM alternativas where idAlternativa = $idalternativa";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return $fila[0];
}

function getAlternativaUrlLogo($conexion,$idalternativa) {
    $sql = "SELECT urlLogo FROM alternativas where idAlternativa = $idalternativa";
    $result = $conexion->query($sql);

    $fila = $result->fetch_row();
    return $fila[0];
}

function getPreguntas($conexion,$idtest){

    $sql = "SELECT * FROM preguntas where idTest = $idtest";

    $result = $conexion->query($sql);
    global $preguntas;
    while($row = $result->fetch_assoc()) {
        $preguntas[] = $row;
    }
}

function getDonut($conexion,$tipo){

  $sql = "SELECT count(*) FROM encuestastests where idTest = $tipo";
  $result = $conexion->query($sql);

  $fila = $result->fetch_row();
  return (int) $fila[0];
}

function getListaUsers($conexion,$by,$modo){
    $sql = "SELECT * FROM users ORDER BY $by $modo";

    $result = $conexion->query($sql);
    global $usuarios;
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

function getRespuestas($conexion,$idencuesta){
$sql = "SELECT elementos,respuestas.idTest,respuestas.idAlternativa,nameAlternativa,nameTest,SUM(resultado)/count(nameAlternativa) as puntos FROM respuestas,tests,alternativas where respuestas.idEncuesta=$idencuesta and respuestas.idTest=tests.idTest and respuestas.idAlternativa=alternativas.idAlternativa GROUP BY idAlternativa,respuestas.idTest order by respuestas.idTest";

    $result = $conexion->query($sql);
    global $respuestas;
    while($row = $result->fetch_assoc()) {
        $respuestas[] = $row;
    }
}

function getRanking($conexion,$idencuesta){
$sql = "SELECT respuestas.idAlternativa,nameAlternativa,urlLogo,SUM(resultado)/COUNT(respuestas.idAlternativa) as puntos FROM respuestas,alternativas where respuestas.idEncuesta=$idencuesta and respuestas.idAlternativa=alternativas.idAlternativa GROUP BY respuestas.idAlternativa ORDER BY SUM(resultado) DESC";
    $result = $conexion->query($sql);
    global $ranking;
    while($row = $result->fetch_assoc()) {
        $row['puntos'] = (double)$row['puntos'];
        $ranking[] = $row;
    }
}

function getPromotores($conexion,$idencuesta){
  $sql = "select x.idAlternativa,(y.number/x.number)*100 as porcentaje
from
(
  SELECT COUNT(idAlternativa) as number,idAlternativa
  FROM respuestas
  where idEncuesta=$idencuesta and idTest=9 Group By idAlternativa
) x
join
(
  SELECT COUNT(idAlternativa) as number,idAlternativa
  FROM respuestas
  where idEncuesta=$idencuesta and idTest=9 and resultado>=90 Group By idAlternativa
) y on x.idAlternativa=y.idAlternativa";

    $result = $conexion->query($sql);
    $pro = null;
    while($row = $result->fetch_assoc()) {
        $pro[] = $row;
    }
    return $pro;
}

function getPasivos($conexion,$idencuesta){
  $sql = "select x.idAlternativa,(y.number/x.number)*100 as porcentaje
from
(
  SELECT COUNT(idAlternativa) as number,idAlternativa
  FROM respuestas
  where idEncuesta=$idencuesta and idTest=9 Group By idAlternativa
) x
join
(
  SELECT COUNT(idAlternativa) as number,idAlternativa
  FROM respuestas
  where idEncuesta=$idencuesta and idTest=9 and resultado<90 and resultado>=70 Group By idAlternativa
) y on x.idAlternativa=y.idAlternativa";

    $result = $conexion->query($sql);
    $pro = null;
    while($row = $result->fetch_assoc()) {
        $pro[] = $row;
    }
    return $pro;
}

function getDetractores($conexion,$idencuesta){
  $sql = "select x.idAlternativa,(y.number/x.number)*100 as porcentaje
from
(
  SELECT COUNT(idAlternativa) as number,idAlternativa
  FROM respuestas
  where idEncuesta=$idencuesta and idTest=9 Group By idAlternativa
) x
join
(
  SELECT COUNT(idAlternativa) as number,idAlternativa
  FROM respuestas
  where idEncuesta=$idencuesta and idTest=9 and resultado<70 Group By idAlternativa
) y on x.idAlternativa=y.idAlternativa";

    $result = $conexion->query($sql);
    $pro = null;
    while($row = $result->fetch_assoc()) {
        $pro[] = $row;
    }
    return $pro;
}


 ?>
