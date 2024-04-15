function IniciarSesion(){


    if (document.getElementById('UserName').value!="" && document.getElementById('Constrasena').value!=""){



        if (document.getElementById('UserName').value=="admin" && document.getElementById('Constrasena').value=="123"){

            document.getElementById('Indicator').innerText = "Bienvenido "+document.getElementById('UserName').value+" entrando en el casino en breve!!!"

            document.getElementById('UserName').value = ""
            document.getElementById('Constrasena').value = ""
    
            window.setTimeout(function(){
            window.location.href = "indexAdminLog.html";}, 3000);
        }else{
            document.getElementById('Indicator').innerText = "No se a encontrado usuario o contraseña..."
        }

    }else{
        document.getElementById('Indicator').innerText = "Uno o mas campos invalidos..."
    }


}