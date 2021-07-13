function siguiente(actual,alternativa_actual,npreguntas,nalternativas) {

   for (i = 1; i <= npreguntas*nalternativas; i++) {
     var id = 'bloque_pregunta_' + i.toString();
     n = document.getElementById(id);
     n.style.display = 'none';
    }

    for (j = 1; j <= nalternativas; j++) {
      var id_alternativa_actual = 'nav_alternativa_' + j.toString();
      nav = document.getElementById(id_alternativa_actual);
      nav.style.display = 'none';
     }

     var id_alternativa_actual = 'nav_alternativa_' + ((alternativa_actual%nalternativas)+1).toString();
     nav = document.getElementById(id_alternativa_actual);
     nav.style.display = 'block';


    var id_actual = 'bloque_pregunta_' + ((actual)%(npreguntas*nalternativas) +1).toString();
    mostrar = document.getElementById(id_actual);
    mostrar.style.display = 'block';

    if(( (actual%nalternativas)+1) == 1 ){
      var marcador = document.getElementById('marcador').innerHTML = Math.trunc((((actual+1)/nalternativas)+1)).toString() + ' / ' + npreguntas;
    }


    var marcador_alternativa = document.getElementById('marcador_alternativa').innerHTML = Math.trunc((alternativa_actual%nalternativas)+1).toString() + ' / ' + nalternativas;



}

function anterior(actual,alternativa_actual,npreguntas,nalternativas) {

  for (i = 1; i <= npreguntas*nalternativas; i++) {
    var id = 'bloque_pregunta_' + i.toString();
    n = document.getElementById(id);
    n.style.display = 'none';
   }

   for (j = 1; j <= nalternativas; j++) {
     var id_alternativa_actual = 'nav_alternativa_' + j.toString();
     nav = document.getElementById(id_alternativa_actual);
     nav.style.display = 'none';
    }

    var ant = alternativa_actual - 1;
    if(ant==0){
      ant = nalternativas;
    }
    var id_alternativa_actual = 'nav_alternativa_' + ant.toString();
    nav = document.getElementById(id_alternativa_actual);
    nav.style.display = 'block';


   var id_actual = 'bloque_pregunta_' + (actual-1).toString();
   mostrar = document.getElementById(id_actual);
   mostrar.style.display = 'block';

   var marcador_alternativa = document.getElementById('marcador_alternativa').innerHTML = Math.trunc(( (actual+1)%nalternativas)+1).toString() + ' / ' + nalternativas;

}
