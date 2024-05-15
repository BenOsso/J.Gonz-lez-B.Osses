




$(document).ready(function(){

    $('#Formulatis').submit(function(){

        event.preventDefault();

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

            var LogeadoExito = false;

            Buscar.forEach(User => {
                

                if ($('#UserName').val()==User.NombreUs && $('#Constrasena').val()==User.Contrasena){
                    
                    LogeadoExito = true;
                }

            });

            if (LogeadoExito==true){

                document.getElementById('Indicator').innerText = "Bienvenido "+$('#UserName').val()+" entrando en el casino en breve!!!"

                document.getElementById('UserName').value = ""
                document.getElementById('Constrasena').value = ""


                
                window.setTimeout(function(){
                    window.location.href = "indexAdminLog.html";}, 3000);



            }else if (LogeadoExito==false){

                document.getElementById('Indicator').innerText = "Usuario o contraseña invalidos..."

            }



          });




    })


})



