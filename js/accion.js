function marcar(idboton,valor,actual,alternativa_actual,ntags) {

   for (i = 1; i <= ntags; i++) {
     var id = 'b' + i.toString() + '_' + actual.toString();
     var idbi = 'i' + i.toString() + '_' + actual.toString();
     b = document.getElementById(id);
     b.style.backgroundColor = "rgba(0,0,0,0.05)";
     bi = document.getElementById(idbi);
     bi.style.display = 'none';
    }

    b = document.getElementById(idboton);
    b.style.backgroundColor = "rgb(248,144,31)";

    var idbi = 'i' + valor.toString() + '_' + actual.toString();
    bi = document.getElementById(idbi);
    bi.style.display = 'block';


    idinput = 'respuesta_' + actual.toString() + '_' + alternativa_actual.toString();
    input = document.getElementById(idinput).value = valor;

}
