<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Acceder con codigo QR  </title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon2.ico"/>
    <link href="../layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/vertical-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="../src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/light/apps/scrumboard.css" rel="stylesheet" type="text/css" />
    
    <link href="../src/assets/css/dark/components/modal.css" rel="stylesheet" type="text/css">
    <link href="../src/assets/css/dark/apps/scrumboard.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL STYLES -->
</head>

<script>
    var sonido = new Audio();
    sonido.src="beep-07a.mp3";
</script>
<script type = "text/javascript">
        function ConfirmRegistro()
        {
            var respuesta = confirm("Se registro de manera correcta");
            
            if(respuesta == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }    
    </script>
<body class="layout-boxed">
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php include "navbar.php" ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="./inicio-dispositivo.php">
                                <img src="../src/assets/img/logop.svg" class="" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="./inicio-dispositivo.php" class="nav-link"> Acceso ITO </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">                    

                    <li class="menu active">
                        <a href="./inicio-dispositivo.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                <span>Escanear codigo</span>
                            </div>
                        </a>
                    </li>



                    
                    
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            



        <h1>
        <div align='center'>    Escanear el C??digo QR
        </h1>


        <?php
            date_default_timezone_set('America/Mexico_City');

        ?>
        <h3>Fecha y hora de registro:</h3>

        <h5><?=date('m/d/y g:ia');?></h5>



        
<br></br>

        <div align='center'><video id="previsualizacion" class="p-1 border" style="width:50%"></video></div>

        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

        <script type="text/javascript">

            var scanner = new Instascan.Scanner({
                video: document.getElementById('previsualizacion'),
                scanPeriod: 5,
                mirror: false
            });

            Instascan.Camera.getCameras().then(function(cameras){
                if (cameras.length >0){
                    scanner.start(cameras[0]);
                    
                } else{
                    console.error('No se han encontrado camaras');
                    alert('Camaras no encontradas.');
                }
            }).catch(function(e){
                console.error(e);
                alert("ERROR:"+e);
            });

            scanner.addListener('scan', function(respuesta){
                sonido.play();
                
                ConfirmRegistro();
                var matri=respuesta;
                window.location.href = window.location.href + "&matri=" + matri;
                //$.post('../php/registrar-hora.php');   
                
                console.log("CONTENIDO: "+ respuesta)  
                
            })

</script>
<?php 
                 include("../php/registrar-hora.php");
                ?>  
        
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper mt-0">
                <div class="footer-section f-section-1">
                    <p class="">Copyright ?? <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->
        
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/plugins/src/global/vendors.min.js"></script>
    <script src="../src/plugins/src/jquery-ui/jquery-ui.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../layouts/vertical-dark-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../src/assets/js/apps/scrumboard.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>