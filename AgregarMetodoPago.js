

$(document).ready(function(){


    

    $('#cochang').submit(function(){

        event.preventDefault();



        if ($('#Titual').val()!="" && $('#NumeroTarjeta').val().toString().length<=16 && $('#Ccv').val().toString().length==3){
            alert('TARJETA GUARDADA CON EXITO!')


            window.setTimeout(function(){
            window.location.href = "indexAdminLog.html";}, 1000);


        }else{
            var Problema = "";
            if ($('#NumeroTarjeta').val().toString().length>16 ){
                Problema+="\nNumero de tarjeta invalido\n"
            }
            if ($('#Ccv').val().toString().length!=3){
                Problema+='\nCCV INVALIDO\n'
            }


            alert(Problema)
        }


    })


})





