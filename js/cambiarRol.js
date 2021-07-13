function rolear(indice) {
  elements = document.getElementsByName('rol');

  if(indice==1){
   nuevo = "Predeterminado";
   alert("Rol establecido a Predeterminado");
  }
  else if (indice==2){
    nuevo = "Poco experimentado";
    alert("Rol establecido a Poco experimentado");
  }
  else if (indice==3){
    nuevo = "Con cierta experiencia";
    alert("Rol establecido a Con cierta experiencia");
  }
  else if (indice==4){
    nuevo = "Especialista";
    alert("Rol establecido a Especialista");
  }

  for (i = 0; i < elements.length; i++) {
     elements[i].value = nuevo;
   }

}
