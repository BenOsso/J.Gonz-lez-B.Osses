$(document).ready(function(){

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



            const userDiv = document.createElement('div');

            userDiv.className = 'carousel-item';

        userDiv.innerHTML = `
        <div class="container">
         <div class="carousel-caption ">
            <div class="row d_flex">
               <div  class="col-md-6">
                  <div class="test_box">
                     <div class="jons">
                        <h4>${User.NombreUs}</h4>
                     </div>
                     <p>Nombre y apellido:${User.PrimerNom} ${User.Appaterno}</p>
                     <p>Correo Electronico:${User.Email}</p>
                  </div>
               </div>
               <div  class="col-md-6">
                  <div class="test_box">
                     <div class="jons">
                        <figure><img src="images/game2.jpg" alt="#"/></figure>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
        `;

        document.getElementById('Gaius').appendChild(userDiv);



        });

        



      });










})