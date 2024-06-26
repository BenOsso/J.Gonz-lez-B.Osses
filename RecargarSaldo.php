<?php

session_start();

if (!isset($_SESSION['usuario'])){
    echo '
       <script> alert("DEBES INICIAR SESIÓN");
               
       </script>
    ';
    header("location: index.php");
    die();
    session_destroy();
}

$cuantasTar = $_SESSION['cantarjetas'];

echo "<script>
        localStorage.clear();
        sessionStorage.clear();
        sessionStorage.setItem('cantarjetas',$cuantasTar);
     </script>";
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Casino Torneo de Cell</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
         
      </style>
   </head>
   <body class="main-layout">
      <div class="wrapper">
         <section class="slider_section">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="text-bg">
                        <a href="Javascript:void(0)">Compra Fichas!!!</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div id="game" class="casino">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2>Compra Fichas!!!</h2>
                        <span></span>
                     </div>
                  </div>
               </div>
               

                  <meta charset="UTF-8">
                
                  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                
                  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
                
                  <script>
                
                    document.addEventListener('DOMContentLoaded', () => {
                
                     // Variables
                
                     const baseDeDatos = [
                
                       {
                
                         id: 1,
                
                         nombre: '500 FICHAS',
                
                         precio: 500,
                
                         imagen:'images/Ficha500.png'
                
                       },
                       {
                
                         id: 2,
                
                         nombre: '1000 FICHAS',
                
                         precio: 1000,
                
                         imagen: 'images/Ficha1000.png'
                
                       },
                
                       {
                
                         id: 3,
                
                         nombre: '5000 FICHAS',
                
                         precio: 5000,
                
                         imagen: 'images/Ficha5000.png'
                
                       },
                
                       {
                
                         id: 4,
                
                         nombre: '10000 FICHAS',
                
                         precio: 10000,
                
                         imagen: 'images/Ficha10000.png'
                
                       }
                
                
                
                     ];
                
                
                
                     let carrito = [];
                
                     const divisa = '$';
                
                     const DOMitems = document.querySelector('#items');
                
                     const DOMcarrito = document.querySelector('#carrito');
                
                     const DOMtotal = document.querySelector('#total');
                
                     const DOMbotonVaciar = document.querySelector('#boton-vaciar');
                     
                     const DOMbotonRealizarCompra = document.querySelector('#boton-comprar');
                
                
                     // Funciones
                
                
                
                     /**
                
                     * Dibuja todos los productos a partir de la base de datos. No confundir con el carrito
                
                     */
                
                     function renderizarProductos() {
                
                       baseDeDatos.forEach((info) => {
                
                         // Estructura
                
                         const miNodo = document.createElement('div');
                
                         miNodo.classList.add('card', 'col-sm-4');
                
                         // Body
                
                         const miNodoCardBody = document.createElement('div');
                
                         miNodoCardBody.classList.add('card-body');
                
                         // Titulo
                
                         const miNodoTitle = document.createElement('h5');
                
                         miNodoTitle.classList.add('card-title');
                
                         miNodoTitle.textContent = info.nombre;
                
                         // Imagen
                
                         const miNodoImagen = document.createElement('img');
                
                         miNodoImagen.classList.add('img-fluid');
                
                         miNodoImagen.setAttribute('src', info.imagen);
                
                         // Precio
                
                         const miNodoPrecio = document.createElement('p');
                
                         miNodoPrecio.classList.add('card-text');
                
                         miNodoPrecio.textContent = `${info.precio}${divisa}`;
                
                         // Boton
                
                         const miNodoBoton = document.createElement('button');
                
                         miNodoBoton.classList.add('btn', 'btn-primary');
                
                         miNodoBoton.textContent = '+';
                
                         miNodoBoton.setAttribute('marcador', info.id);
                
                         miNodoBoton.addEventListener('click', anyadirProductoAlCarrito);
                
                         // Insertamos
                
                         miNodoCardBody.appendChild(miNodoImagen);
                
                         miNodoCardBody.appendChild(miNodoTitle);
                
                         miNodoCardBody.appendChild(miNodoPrecio);
                
                         miNodoCardBody.appendChild(miNodoBoton);
                
                         miNodo.appendChild(miNodoCardBody);
                
                         DOMitems.appendChild(miNodo);
                
                       });
                
                     }
                
                
                
                     /**
                
                     * Evento para añadir un producto al carrito de la compra
                
                     */
                
                     function anyadirProductoAlCarrito(evento) {
                
                       // Anyadimos el Nodo a nuestro carrito
                
                       carrito.push(evento.target.getAttribute('marcador'))
                
                       // Actualizamos el carrito
                
                       renderizarCarrito();
                
                
                
                     }
                
                
                
                     /**
                
                     * Dibuja todos los productos guardados en el carrito
                
                     */
                
                     function renderizarCarrito() {
                
                       // Vaciamos todo el html
                
                       DOMcarrito.textContent = '';
                
                       // Quitamos los duplicados
                
                       const carritoSinDuplicados = [...new Set(carrito)];
                
                       // Generamos los Nodos a partir de carrito
                
                       carritoSinDuplicados.forEach((item) => {
                
                         // Obtenemos el item que necesitamos de la variable base de datos
                
                         const miItem = baseDeDatos.filter((itemBaseDatos) => {
                
                           // ¿Coincide las id? Solo puede existir un caso
                
                           return itemBaseDatos.id === parseInt(item);
                
                         });
                
                         // Cuenta el número de veces que se repite el producto
                
                         const numeroUnidadesItem = carrito.reduce((total, itemId) => {
                
                           // ¿Coincide las id? Incremento el contador, en caso contrario no mantengo
                
                           return itemId === item ? total += 1 : total;
                
                         }, 0);
                
                         // Creamos el nodo del item del carrito
                
                         const miNodo = document.createElement('li');
                
                         miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                
                         miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}${divisa}`;
                
                         // Boton de borrar
                
                         const miBoton = document.createElement('button');
                
                         miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                
                         miBoton.textContent = 'X';
                
                         miBoton.style.marginLeft = '1rem';
                
                         miBoton.dataset.item = item;
                
                         miBoton.addEventListener('click', borrarItemCarrito);
                
                         // Mezclamos nodos
                
                         miNodo.appendChild(miBoton);
                
                         DOMcarrito.appendChild(miNodo);
                
                       });
                
                       // Renderizamos el precio total en el HTML
                
                       DOMtotal.textContent = calcularTotal();
                
                     }
                
                
                
                     /**
                
                     * Evento para borrar un elemento del carrito
                
                     */
                
                     function borrarItemCarrito(evento) {
                
                       // Obtenemos el producto ID que hay en el boton pulsado
                
                       const id = evento.target.dataset.item;
                
                       // Borramos todos los productos
                
                       carrito = carrito.filter((carritoId) => {
                
                         return carritoId !== id;
                
                       });
                
                       // volvemos a renderizar
                
                       renderizarCarrito();
                
                     }
                
                
                
                     /**
                
                      * Calcula el precio total teniendo en cuenta los productos repetidos
                
                      */
                
                     function calcularTotal() {
                
                       // Recorremos el array del carrito
                
                       return carrito.reduce((total, item) => {
                
                         // De cada elemento obtenemos su precio
                
                         const miItem = baseDeDatos.filter((itemBaseDatos) => {
                
                           return itemBaseDatos.id === parseInt(item);
                
                         });
                
                         // Los sumamos al total
                
                         return total + miItem[0].precio;
                
                       }, 0).toFixed(2);
                
                     }
                
                
                
                     /**
                
                     * Varia el carrito y vuelve a dibujarlo
                
                     */
                
                     function vaciarCarrito() {
                
                       // Limpiamos los productos guardados
                
                       carrito = [];
                
                       // Renderizamos los cambios
                
                       renderizarCarrito();

                       document.getElementById('Indicator').innerText = 'Compra cancelada, volviendo al inicio...'
                       window.setTimeout(function(){
                      window.location.href = "indexUser.php";}, 3000);
                
                     }

                     function realizarCompra(){
                      if (carrito.length!=0){
                        if (sessionStorage.getItem('cantarjetas')==0){
                          alert('NO TIENES NINGUN METODO DE PAGO CONFIGURADO')

                        }else{

                      const Total = calcularTotal()
                      vaciarCarrito()
                      actualizarSaldo(Total,0);
                      document.getElementById('Indicator').innerText = 'COMPRA REALIZADA POR '+Total+'CLP CORRECTAMENTE!!! Volviendo al inicio...'
                      window.setTimeout(function(){
                      window.location.href = "indexUser.php";}, 3000);
                        }
                      }else{
                        document.getElementById('Indicator').innerText = 'Agregar objetos al carrito antes de comprar...'
                      }
                     }

                     function actualizarSaldo(cantidad,GanaPierde){
                           fetch('php/actualizarsaldo.php', {
                               method: 'POST',
                               headers: {
                                   'Content-Type': 'application/x-www-form-urlencoded',
                               },
                               body: `cantidad_fichas=${cantidad}&gana_pierde=${GanaPierde}`,
                           })
                           .then(response => response.json())
                           .then(data => {
                               if (data.success) {
                                   alert(data.message);
                               } else {
                                   alert('Error: ' + data.message);
                               }
                           })
                           .catch((error) => {
                               console.error('Error:', error);
                           });
                      }


                
                
                
                     // Eventos
                
                     DOMbotonVaciar.addEventListener('click', vaciarCarrito);
                     
                     DOMbotonRealizarCompra.addEventListener('click',realizarCompra);
                
                
                     // Inicio
                
                     renderizarProductos();
                
                     renderizarCarrito();
                
                    });
                
                  </script>
                
                <body>
                
                  <div class="container">
                
                    <div class="row">
                
                      <!-- Elementos generados a partir del JSON -->
                
                      <main id="items" class="col-sm-8 row"></main>
                
                      <!-- Carrito -->
                
                      <aside class="col-sm-4">
                
                        <h2 style="color:darkgoldenrod; font-size: 45px;">Carrito</h2>
                
                        <!-- Elementos del carrito -->
                
                        <ul id="carrito" class="list-group"></ul>
                
                        <hr>
                
                        <!-- Precio total -->
                
                        <p class="text-right" style="color: darkgoldenrod; font-size: 35px;">Total: <span id="total"></span></p>
                
                        <button id="boton-vaciar" class="btn btn-danger">Cancelar Compra</button>

                        <button id="boton-comprar" class="btn btn-danger" style="background-color: green;">Realizar Compra</button>
                
                      </aside>
                
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                         <div class="titlepage">
                            <h2 id="Indicator"></h2>
                         </div>
                      </div>
                   </div>
                   <div class="copyright">
                    <div class="container">
                       <p>Copyright 2024 Casino Torneo de Cell</p>
                    </div>
                 </div>
                
                  </div>
                
                </body>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
