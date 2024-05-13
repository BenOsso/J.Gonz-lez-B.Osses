

function calcularEdad(fecha) {
  var hoy = new Date();
  var cumpleanos = new Date(fecha);
  var edad = hoy.getFullYear() - cumpleanos.getFullYear();
  var m = hoy.getMonth() - cumpleanos.getMonth();

  if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
      edad--;
  }

  return edad;
}


var Usuarios = []




var IdUsd = 0;

function Ajustes(){
  var settings = {
    "url": "https://getpantry.cloud/apiv1/pantry/b8a1b736-2e0e-4df0-af0c-4d187651dbb6/basket/Usuarios",
    "method": "GET",
    "timeout": 0,
    "headers": {
      "Content-Type": "application/json"
    },
  };


  $.ajax(settings).done(function (response) {
    const Buscar = response.Usuarios
    Buscar.forEach(User => {

      Usuarios.push(User.NombreUs);

      if (User.idUs>IdUsd){
        IdUsd = User.idUs;
      }

    });

    IdUsd+=1;

  });
  
}





$(document).ready(function(){


    $('#cochang').submit(function(){
        event.preventDefault();
        if (calcularEdad($('#Fetcha').val())<18){
          alert('NO SE PUEDE CREAR UNA CUENTA SIENDO MENOR DE EDAD!')
        }else{
          if (Usuarios.includes($('#UserNom').val())==false){

            
            alert('USUARIO REGISTRADO CORRECTAMENTE!!')
            window.setTimeout(function(){
            window.location.href = "index.html";}, 3000);
         
          
          }else{
            alert('USUARIO YA EXISTE!')
          }

        }



    })
})
