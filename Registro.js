

function Gaga(){


    if (document.getElementById('PrimerNom').value!="" && document.getElementById('Appa').value!=""
&& document.getElementById('Corre').value!="" && document.getElementById('UserNom').value!="" && document.getElementById('Constrasena').value!=""){

        document.getElementById('Indicator').innerText = "Bienvenido "+document.getElementById('PrimerNom').value+" "+document.getElementById('Appa').value+"("+document.getElementById('UserNom').value+")"+"!!!"

        document.getElementById('PrimerNom').value = ""
        document.getElementById('SegunN').value = ""
        document.getElementById('Appa').value = ""
        document.getElementById('Apm').value = ""
        document.getElementById('Corre').value = ""
        document.getElementById('UserNom').value = ""
        document.getElementById('Constrasena').value = ""

        window.setTimeout(function(){
        window.location.href = "index.html";}, 3000);


    }else{
        document.getElementById('Indicator').innerText = "Uno o mas campos invalidos..."
    }


}



