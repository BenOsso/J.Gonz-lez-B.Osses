

$(document).ready(function(){

    $('#cochang').submit(function(){

        event.preventDefault();

        if ($('#NumeroTarjeta').val().toString().length<=16 && $('#Ccv').val().toString().length==3){
            alert('TARJETA GUARDADA CON EXITO!')


            window.setTimeout(function(){
            window.location.href = "indexAdminLog.html";}, 1000);


        }else{
            alert('UNO O MAS CAMPOS INVALIDOS.')
        }


    })


})





