

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

function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}



$(document).ready(function(){


    $('#cochang').submit(function(){
        event.preventDefault();
        if (calcularEdad($('#Fetcha').val())<18){
          alert('NO SE PUEDE CREAR UNA CUENTA SIENDO MENOR DE EDAD!')
        }else{

          let Jugo = "";


          

          if ($('#UserNom').val().length>20){
            Jugo+='\nNombre de usuario demasiado largo.\n'
          }
          if ($('#PrimerNom').val().length>30){
            Jugo+='\nNombre invalido.\n'
          }
          if ($('#Appa').val().length>30){
            Jugo+='\nApellido invalido.\n'
          }
          if ($('#SegunN').val().length>30){
            Jugo+='\nSegundo nombre invalido.\n'
          }
          if ($('#Apm').val().length>30){
            Jugo+='\nApellido materno invalido.\n'
          }
          
          if (Jugo!=""){

            alert(Jugo)

          }else{

            const UsuarioNuev = {
              NombreUser : $('#UserNom').val(),
              PrimerNom : $('#PrimerNom').val(),
              SegunNom : $('#SegunN').val(),
              ApellidoP : $('#Appa').val(),
              ApellidoM : $('#Apm').val(),
              Correo : $('#Corre').val(),
              FechaNac : $('#Fetcha').val(),
              Contrasena : $('#Constrasena').val()
            }

            //var settings = {
            //  "url": "https://getpantry.cloud/apiv1/pantry/YOUR_PANTRY_ID/basket/YOUR_BASKET_NAME",
            //  "method": "PUT",
            //  "timeout": 0,
            //  "headers": {
            //    "Content-Type": "application/json"
            //  },
            //  "data": JSON.stringify({
            //    "Usuarios": [
            //      {
            //          "idUs": getRndInteger(10,100),
            //          "NombreUs": UsuarioNuev.NombreUser,
            //          "Contrasena": UsuarioNuev.Contrasena,
            //          "PrimerNom": UsuarioNuev.PrimerNom,
            //          "SeguNom": UsuarioNuev.SegunNom,
            //          "Appaterno": UsuarioNuev.ApellidoP,
            //          "Apmaterno": UsuarioNuev.ApellidoM,
            //          "Email": UsuarioNuev.Correo,
            //          "Tarjeta": [
            //          ],
            //          "Saldo": 5000
            //        }
            //    ]
            //  }),
            //};
            
            //$.ajax(settings).done(function (response) {
            //  console.log(response);
            //  console.log('Registro en api exitoso.')
            //});




            console.log(UsuarioNuev)

            alert('USUARIO REGISTRADO CORRECTAMENTE!! Bienvenid@ '+UsuarioNuev.NombreUser)
            window.setTimeout(function(){
            window.location.href = "index.html";}, 3000);

          }
          
        }



    })
})
