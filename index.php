<?php include('./functions/functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Moonycoin</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">


    <style>
        .img-profile {
            object-fit: cover;
            width: 40px;
            height: 40px;
        }
    </style>
    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container d-flex justify-content-center align-items-center">


            <a class="navbar-brand logo-image" href="index.php">Moonycoin</a>



            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header"> INICIO<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#descripcion">DESCRIPCIÓN</a>
                    </li>
                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Más</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="reset-password.php"><span class="item-text">Cambiar
                                    contraseña</span></a>

                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="./pages/changeName.php"><span class="item-text">
                                    Cambiar Nombre</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="./pages/changeApelli.php"><span class="item-text">
                                    Cambiar Apellido</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="./services/listUser.php"><span class="item-text">
                                    ver usuarios</span></a>

                            <?php

                            $dataUser = getCookie();

                            $userAdmin = 'admin1';
                            if ($dataUser['user'] === $userAdmin) {
                                echo '  <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="register.php"><span class="item-text">
                                    Agregar Usuarios</span></a>';
                            }



                            ?>

                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="logout.php"><span class="item-text">Cerrar sesión</span></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">CARACTERÍSTICAS</a>
                    </li>
                    <li class="nav-item">

                        <?php
                        if (!isset($_COOKIE['dataUser'])) {
                            echo ' <a class="btn-outline-sm" href="login.php"> ACCESO</a></li>';
                        } else {

                            $dataUser = unserialize($_COOKIE['dataUser']);

                            $showImage = getImage();

                            echo '<div class="d-flex justify-content-center align-items-center " style="gap: 12px;">
                            <span class="text-white">' . $dataUser['user'] . '</span>
                            <img src="data:image/jpeg;base64,' . $showImage . '"  class ="rounded-circle img-profile">
                            </div>
                          
                            ';



                        }
                        ?>




                </ul>

            </div>
        </div>
    </nav>


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container ">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <h1>¿Qué es Moonycoin?</h1>
                            <p class="p-large">Moonycoin es una aplicación hecha y desarrollada en base a la economía
                                personal de los nuevos jóvenes adultos que están buscando iniciar su independencia
                                financiera personal. además, brinda ayuda a todo aquel que necesite distribuir u
                                organizar su dinero de manera más rápida y sencilla.</p>
                            <a class="btn-solid-lg page-scroll" href="#">Descargar APK</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                <img class="img-fluid" src="astro.png" alt="alternative">
                            </div> <!-- end of img-wrapper -->
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
        viewBox="0 0 1920 310">
        <defs>
            <style>
                .cls-1 {
                    fill: #5f4def;
                }
            </style>
        </defs>
        <title>header-frame</title>
        <path class="cls-1"
            d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z" />
    </svg>
    <!-- end of header -->


    <!-- Customers -->

    <!-- end of customers -->


    <!-- Description -->
    <div id="descripcion" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Descripción</div>
                    <h2 class="h2-heading">IMPUESTOS</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">¿Qué es el IVA?</h4>
                            <p>El IVA o Impuesto sobre el Valor Añadido es un impuesto indirecto que grava el consumo
                                final de productos y servicios producidos tanto en el territorio nacional como en el
                                exterior.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">¿Qué son las Expensas?</h4>
                            <p>Es un impuesto que se encarga de cubrir los gastos de mantenimiento del edificio que
                                deben ser abonados proporcionalmente de acuerdo al porcentaje que corresponda en razón
                                de los metros cuadrados de cada departamento. Se deducen de manera mensual y son
                                obligatorias para todos los propietarios e inquilinos que habiten ese edificio.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">¿Qué es el Impuesto a las ganancias?</h4>
                            <p>El impuesto a la ganancia es un tributo en el que las personas físicas o las empresas le
                                pagan al estado según los ingresos o ganancias que declaren haber tenido en el curso del
                                año. Es un impuesto al ingreso que se cobra a cada persona o empresa que este en blanco.
                            </p>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Descripción</div>
                    <h2 class="h2-heading">MÉTODOS DE PAGO</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">¿Qué es y para qué sirve una tarjeta de crédito?</h4>
                            <p>La Tarjeta de crédito es una herramienta muy útil a la hora de comprar algo y no poseer
                                dinero en efectivo o en el fondo de tu cuenta, ya que podemos adquirir credito de una
                                entidad, la compra podrá realizarse siempre y cuando el establecimiento este afiliado a
                                la entidad correspondiente.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">¿Qué es y para qué sirve una tarjeta de débito?</h4>
                            <p>con una cuenta bancaria permitimos operar con la entidad a través de cajeros automáticos
                                (consultar saldos, realizar depósitos o extracciones de efectivo, pagar servicios, y
                                enviar transferencias entre otras operaciones) o realizar pagos en diferentes comercios.
                            </p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">¿Qué son los pagos móviles o NFC?</h4>
                            <p> Los pagos por móvil o NFC(son cobros que se realizan por aproximación utilizando
                                sensores incorporados en tarjetas de débito, crédito y otros dispositivos) te permiten
                                pagar bienes y servicios desde tu smartphone sin necesidad de utilizar dinero en
                                efectivo o una tarjeta de crédito física. no tienen por qué realizarse únicamente a
                                través de Apple Pay o Google Pay y tarjetas de pago tokenizadas. Asimismo, existen
                                numerosas plataformas que incluyen pagos con código QR.</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="above-heading">Descripción</div>
                                <h2 class="h2-heading">OTROS</h2>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- Card -->
                                <div class="card">
                                    <div class="card-image">

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Monotributo ¿Qué es?</h4>
                                        <p>El monotributo unifica el componente impositivo -IVA y Ganancias- y el
                                            componente previsional -aportes jubilatorios y obra social- en una única
                                            cuota mensual, haciendo más simple y ágil cumplir con tus obligaciones. Para
                                            permanecer en el régimen, deberán cumplir con determinados valores de
                                            parámetros como facturación anual, superficie de locales, energía eléctrica
                                            consumida y el monto de alquiler del local/es.</p>
                                    </div>
                                </div>
                                <!-- end of card -->

                                <!-- Card -->
                                <div class="card">
                                    <div class="card-image">

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">¿Qué es la jubilación?</h4>
                                        <p>Es una remuneración periódica que se recibe una vez cumplido un empleo
                                            público o privado, ciertos requisitos de edad, tiempo de labor y aportes.
                                        </p>
                                    </div>
                                </div>
                                <!-- end of card-->
                                <!-- Card -->
                                <div class="card">
                                    <div class="card-image">

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">¿Qué es el AFIP?</h4>
                                        <p>La Administración Federal de Ingresos Públicos (AFIP) es el organismo que
                                            tiene a su cargo la ejecución de la política tributaria, aduanera y de
                                            recaudación de los recursos de la seguridad social de la Nación.</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-image">

                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">¿Qué son los aportes?</h4>
                                        <p>Los aportes están a cargo del trabajador. Las contribuciones están a cargo de
                                            tu empleador. Los importes a pagar en concepto de aportes y de
                                            contribuciones se determinan de acuerdo con la cantidad de horas trabajadas.
                                        </p>
                                    </div>
                                </div>
                                <!-- end of card -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div>
                </div> <!-- end of cards-1 -->
                <!-- end of description -->


                <!-- Features -->
                <div id="features" class="tabs">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="above-heading">FEATURES</div>
                                <h2 class="h2-heading">Conoce más acerca de la App!</h2>
                                <p class="p-heading">A continuación vas a ver en detalle cada función de la app</p>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- Tabs Links -->
                                <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1"
                                            role="tab" aria-controls="tab-1" aria-selected="true"><i
                                                class="fas fa-list"></i>Registro</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab"
                                            aria-controls="tab-2" aria-selected="false"><i
                                                class="fas fa-envelope-open-text"></i>Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab"
                                            aria-controls="tab-3" aria-selected="false"><i
                                                class="fas fa-chart-bar"></i>Categorias</a>
                                    </li>
                                </ul>
                                <!-- end of tabs links -->

                                <!-- Tabs Content -->
                                <div class="tab-content" id="argoTabsContent">

                                    <!-- Tab -->
                                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel"
                                        aria-labelledby="tab-1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="image-container">
                                                    <img class="img-fluid" src="images/pantalla de login.png"
                                                        alt="alternative">
                                                </div> <!-- end of image-container -->
                                            </div> <!-- end of col -->
                                            <div class="col-lg-6">
                                                <div class="text-container">
                                                    <h3>Registro</h3>
                                                    <p>Al entrar a la aplicación lo primero que va salir es la pantalla
                                                        de registro para crear tu cuenta en Moonycoin y poder disfrutar
                                                        de sus herramientas</p>
                                                    <ul class="list-unstyled li-space-lg">
                                                        <li class="media">
                                                            <i class="fas fa-square"></i>
                                                            <div class="media-body">Guarda tus datos personales</div>
                                                        </li>
                                                        <li class="media">
                                                            <i class="fas fa-square"></i>
                                                            <div class="media-body">Permite mayor accesibilidad</div>
                                                        </li>

                                                    </ul>

                                                </div> <!-- end of text-container -->
                                            </div> <!-- end of col -->
                                        </div> <!-- end of row -->
                                    </div> <!-- end of tab-pane -->
                                    <!-- end of tab -->

                                    <!-- Tab -->
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="image-container">
                                                    <img class="img-fluid" src="images/inicio (1).png"
                                                        alt="alternative">
                                                </div> <!-- end of image-container -->
                                            </div> <!-- end of col -->
                                            <div class="col-lg-6">
                                                <div class="text-container">
                                                    <h3>Inicio</h3>
                                                    <p>Una vez que hayas registrado tu cuenta o iniciaste sesión vas a
                                                        dirigirte a la panta de inicio dónde vas a encontrar:</p>
                                                    <ul class="list-unstyled li-space-lg">
                                                        <li class="media">
                                                            <i class="fas fa-square"></i>
                                                            <div class="media-body">La calculadora en la cual vas a
                                                                ingresar el monto de tu sueldo</div>
                                                        </li>


                                                    </ul>

                                                </div> <!-- end of text-container -->
                                            </div> <!-- end of col -->
                                        </div> <!-- end of row -->
                                    </div> <!-- end of tab-pane -->
                                    <!-- end of tab -->

                                    <!-- Tab -->
                                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="image-container">
                                                    <img class="img-fluid" src="images/texto.png" alt="alternative">
                                                </div> <!-- end of image-container -->
                                            </div> <!-- end of col -->
                                            <div class="col-lg-6">
                                                <div class="text-container">
                                                    <h3>información</h3>
                                                    <p>En la sección de información se podra ver datos sobre economía
                                                        general</p>
                                                    <ul class="list-unstyled li-space-lg">
                                                        <li class="media">
                                                            <i class="fas fa-square"></i>
                                                            <div class="media-body">La información esta relacionada a
                                                                necesidades de los usuarios</div>
                                                        </li>
                                                        <li class="media">
                                                            <i class="fas fa-square"></i>
                                                            <div class="media-body">Ayuda a mantener informado al
                                                                usuario</div>
                                                        </li>

                                                    </ul>

                                                </div> <!-- end of text-container -->
                                            </div> <!-- end of col -->
                                        </div> <!-- end of row -->
                                    </div> <!-- end of tab-pane -->
                                    <!-- end of tab -->

                                </div> <!-- end of tab content -->
                                <!-- end of tabs content -->

                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div> <!-- end of tabs -->




            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- video -->
    <div id="video" class="basic-2">
        <h1>Tutorial</h1>

        <div class="d-flex justify-content-center align-item-center">
            <img src="astro.png" class="w-25 h-25" />
            <video width="250" height="380" controls autoplay>
                <source src="tutorial.mp4" autoplay type="video/mp4">
            </video>
            <img src="astro.png" class="w-25 h-25" />
        </div>



    </div> <!-- end of row -->
    </div>
    </div><!-- end of video -->





    </div> <!-- end of img-wrapper -->
    </div> <!-- end of image-container -->
    </div> <!-- end of col -->
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
        viewBox="0 0 1920 310">
        <defs>
            <style>
                .cls-1 {
                    fill: #5f4def;
                }
            </style>
        </defs>
        <title>header-frame</title>
        <path class="cls-1" d="M0" />
    </svg>
    <!-- end of header -->


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="above-heading">información</div>
                <h2 class="h2-heading"></h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Card -->
                <div class="card">
                    <div class="card-image">

                    </div>
                    <div class="card-body">
                        <h4 class="card-title">SOBRE NOSOTROS</h4>
                        <p>Nuestro grupo se encargó de investigar como estos nuevos adultos podrían manejar su dinero
                            de una forma más amena pero que a la vez sepan la importancia de saber organizar bien cada
                            gasto.
                            no sólo van a aprender a distribuir su dinero sino que también a poder aprender conceptos
                            básicos
                            sobre economía y otros datos necesarios, como por ejemplo tarjetas de crédito/débito,
                            expensas, etc,
                            los cuales son conceptos básicos pero muy necesarios de saber y entender para todos
                            para todos los jóvenes que ya pasarían a tener una vida adulta y responsable,
                            dejando atrás sus etapas de jóvenes adolescentes despreocupados.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><br>




    <!-- Footer -->
    <svg class="footer-frame" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
        viewBox="0 0 1920 79">
        <defs>

        </defs>
        <title>footer-frame</title>
        <path class="cls-2"
            d="M0,72.427C143,12.138,255.5,4.577,328.644,7.943c147.721,6.8,183.881,60.242,320.83,53.737,143-6.793,167.826-68.128,293-60.9,109.095,6.3,115.68,54.364,225.251,57.319,113.58,3.064,138.8-47.711,251.189-41.8,104.012,5.474,109.713,50.4,197.369,46.572,89.549-3.91,124.375-52.563,227.622-50.155A338.646,338.646,0,0,1,1920,23.467V79.75H0V72.427Z"
            transform="translate(0 -0.188)" />
    </svg>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col first">
                        <h4>¡Saludos!</h4>
                        <p class="p-small">Esperamos que hayas disfrutado la experiencia del sitio web y la aplicacion!
                        </p>
                    </div>
                </div> <!-- end of col -->

                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Contacto</h4>
                        <ul class="list-unstyled li-space-lg p-small">

                            <li class="media">
                                <i class="fas fa-envelope"></i>
                                <div class="media-body"><a class="white"
                                        href="moonycoin@gmail.com">moonycoin@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small"><a href="https://inovatik.com"></a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>