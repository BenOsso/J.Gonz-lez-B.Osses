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
}else{

  $mysqli = new mysqli("localhost","root","","casino");

// Checking for connections
if ($mysqli->connect_error) {
die('Connect Error (' .
$mysqli->connect_errno . ') '.
$mysqli->connect_error);
}
$iduser = $_SESSION['idusuario'];
// SQL query to select data from database
$sql = "SELECT titular,numerostarjeta,ccv,fechavenc FROM tarjetas WHERE idusuarioposeedor = $iduser ";
$result = $mysqli->query($sql);
$mysqli->close();

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Casino Torneo de Cell - Agregar metodo de pago</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link
      rel="stylesheet"
      href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen"
    />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
  </head>
  <!-- body -->
  <body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <div class="wrapper">

    <div class="casino">
      <div class="container">
        <div class="row">
          <div class="col-md-4 margin_bottom1">
            <div class="game_box">
                <?php 
                    // LOOP TILL END OF DATA
                    while($rows=$result->fetch_assoc())
                    {
                ?>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    <h2><?php echo $rows['titular'];?></h2>
                    <h3><?php echo $rows['numerostarjeta'];?></h3>
                    <h3><?php echo $rows['ccv'];?></h3>
                    <h3><?php echo $rows['fechavenc'];?></h3>

                <?php
                    }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>



      <div id="contact" class="reqeste">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="titlepage">
                <h2>Agregar metodo de pago!!!!</h2>
                <span></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <form class="form_main" method="post" action="php/registrar_tarjeta.php">
                <div class="row">
                  <div class="col-md-12">
                    <input
                      id="Titual"
                      class="form_control"
                      placeholder="Nombre titular *"
                      type="text"
                      name="titular"
                      size="30"
                      required
                    />
                  </div>
                  <div class="col-md-12">
                    <input
                      id="NumeroTarjeta"
                      class="form_control"
                      placeholder="Numeros Tarjeta *"
                      type="number"
                      name="Numerols"
                      size="16"
                      required
                    />
                  </div>
                  <div class="col-md-12">
                    <input
                      id="Ccv"
                      class="form_control"
                      placeholder="CCV *"
                      type="number"
                      name="ccv"
                      size="3"
                      required
                    />
                  </div>
                  <div class="col-md-12">
                    <input
                      id="Month"
                      type="month"
                      value="2027-02"
                      min="2024-05"
                      name="fectha"
                    />
                  </div>

                  <div class="col-md-12">
                    <button class="send_btn">
                      Agregar metodo de pago
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <br />
          <br />
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
                      <h3></h3>
                      <ul class="Menu_footer">
                        <li>
                          <a href="indexUser.php"
                            >Volver al menu anterior</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"></div>
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
      $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
          theme: "minimal",
        });

        $("#dismiss, .overlay").on("click", function () {
          $("#sidebar").removeClass("active");
          $(".overlay").removeClass("active");
        });

        $("#sidebarCollapse").on("click", function () {
          $("#sidebar").addClass("active");
          $(".overlay").addClass("active");
          $(".collapse.in").toggleClass("in");
          $("a[aria-expanded=true]").attr("aria-expanded", "false");
        });
      });
    </script>
    <script>
      $(document).ready(function () {
        $(".fancybox").fancybox({
          openEffect: "none",
          closeEffect: "none",
        });

        $(".zoom").hover(
          function () {
            $(this).addClass("transition");
          },
          function () {
            $(this).removeClass("transition");
          }
        );
      });
    </script>
    
  </body>
</html>
