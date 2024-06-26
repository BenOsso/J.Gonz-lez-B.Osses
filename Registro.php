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
      <title>Casino Torneo de Cell - Registrarse</title>
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
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <div class="wrapper">
         
         <div id="contact" class="reqeste">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2>Juega con nosotros!!!</h2>
                        <span></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <form method="post" action="php/registrar_usuario.php" class="form_main">
                        <div class="row">

                           <div class="col-md-12">
                              <input class="form_control" placeholder="Primer Nombre *" type="text" name="PNom" required>
                           </div>
                           <div class="col-md-12">
                              <input class="form_control" placeholder="Segundo Nombre" type="text" name="SNom">
                           </div>
                           <div class="col-md-12">
                              <input  class="form_control" placeholder="Apellido Paterno *" type="text" name="App" required>
                           </div>
                           <div class="col-md-12">
                              <input  class="form_control" placeholder="Apellido Materno" type="text" name="Apm">
                           </div>
                           <div class="col-md-12">
                              <input  class="form_control" placeholder="Correo Electronico *" type="email" name="Corr" required>
                           </div>
                           <div class="col-md-12">
                              <input   type="date" value="2003-12-12" min="1920-01-01" max="2023-12-31"  name="Fecha">
                           </div>
                           <div class="col-md-12">
                              <input  class="form_control" placeholder="Nombre de usuario *" type="text" name="Usname" required>
                           </div>
                           <div class="col-md-12">
                              <input  class="form_control" placeholder="Contraseña *" type="password" name="Password" required>
                           </div>
                           <div class="col-md-12">
                              <button class="send_btn">Registrarse</button>
                           </div>
                        </div>
                     </form>
                  </div> 
               </div>
               <br>
               <br>
               <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2 id="Indicator"></h2>
                     </div>
                  </div>
               </div>
              

            </div>
         </div>
         <!-- end reqeste -->
         <!--  footer -->
         <footer>
            <div class="footer">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <div class="address">
                                 <h3>Links</h3>
                                 <ul class="Menu_footer">
                                    <li><a href="index.html">Inicio</a> </li>
                                    <li><a href="#game">Juegos</a> </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="copyright">
                  <div class="container">
                     <p>Copyright 2024 Casino Torneo de Cell</p>
                  </div>
               </div>
            </div>
         </footer>
         <!-- end footer -->
      </div>
      <div class="overlay"></div>
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
       <script src="js/custom.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
             $("#sidebar").mCustomScrollbar({
                 theme: "minimal"
             });
         
             $('#dismiss, .overlay').on('click', function() {
                 $('#sidebar').removeClass('active');
                 $('.overlay').removeClass('active');
             });
         
             $('#sidebarCollapse').on('click', function() {
                 $('#sidebar').addClass('active');
                 $('.overlay').addClass('active');
                 $('.collapse.in').toggleClass('in');
                 $('a[aria-expanded=true]').attr('aria-expanded', 'false');
             });
         });
      </script>
      <script>
         $(document).ready(function() {
             $(".fancybox").fancybox({
                 openEffect: "none",
                 closeEffect: "none"
             });
         
             $(".zoom").hover(function() {
         
                 $(this).addClass('transition');
             }, function() {
         
                 $(this).removeClass('transition');
             });
         });
      </script>
      
     
   </body>
</html>

