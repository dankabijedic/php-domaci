<?php

include "../konekcija.php";
include "../drzave.php";
$drzava = Drzava::getCountry($conn);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Level HTML Template</title>
    <!--

Template 2095 Level

http://www.tooplate.com/view/2095-level

-->
    <!-- load stylesheets -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
   <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
    <link rel="stylesheet" href="css/tooplate-style.css"> <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>


    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-top-bar" id="tm-top-bar">
            <!-- Top Navbar -->
            <div class="container">
                <div class="row">

                    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
                        <a class="navbar-brand logo-text page-scroll" href="index.html">Magnus</a>
                        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="btn-round-custom" href="#">Pocetna</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn-round-custom" href="aranzmani/aranzmani.php">Aranzmani</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn-round-custom" href="#services">Pretraga</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn-round-custom" href="#callMe">Kontakt</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
        <div class="tm-section tm-bg-img" id="tm-section-1">
            <div class="tm-bg-white ie-container-width-fix-2">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                            <form action="index.html" method="get" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <select class="form-control" name="naziv_drzave" id="naziv_drzave" placeholder="Drzava">                                      
                                        <option value="" disabled selected>Drzava</option>
                                        <?php foreach($drzava as $d): ?>
                        <option value="<?php echo $d->id_drzave;?>">
                            <?php echo $d->naziv_drzave;?>
                        </option>
                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <input name="Mesto" type="text" class="form-control" id="mesto" placeholder="Mesto">
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                        <input name="datum_polaska" type="text" class="form-control" id="datum_polaska" placeholder="Datum Polaska">
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                        <input name="datum_povratka" type="text" class="form-control" id="datum_povratka" placeholder="Datum Povratka">
                                    </div>
                                </div>
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                        <input name="cena_u_evrima" type="text" class="form-control" id="cena_u_evrima" placeholder="Cena u evrima">
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <select name="adult" class="form-control tm-select" id="nacin_prevoza">
                                            <option value="">Nacin prevoza</option>
                                            <option value="1">Autobus</option>
                                            <option value="2">Avion</option>
                                        </select>
                                        <i class="fa fa-2x fa-user tm-form-element-icon"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <select name="children" class="form-control tm-select" id="tip_smestaja">
                                            <option value="">Tip smestaja</option>
                                            <option value="1">Hotel *</option>
                                            <option value="2">Hotel **</option>
                                            <option value="3">Hotel ***</option>
                                            <option value="4">Hotel ****</option>
                                            <option value="5">Hotel *****</option>

                                        </select>
                                        <i class="fa fa-user tm-form-element-icon tm-form-element-icon-small"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <button type="submit" class="btn btn-primary tm-btn-search">Sacuvaj</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-section-2">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="tm-section-title">We are here to help you?</h2>
                        <p class="tm-color-white tm-section-subtitle">Subscribe to get our newsletters</p>
                        <a href="#" class="tm-color-white tm-btn-white-bordered">Subscribe Newletters</a>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>