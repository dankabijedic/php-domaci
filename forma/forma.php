<?php

include "../konekcija.php";
include "../drzave.php";
include "../aranzmani/aranzmaniobrada.php";

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
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css"> <!-- Templatemo style -->
    <link rel="stylesheet" href="../css/izgled.css">


</head>


<body>

    <?php

    if (isset($_POST['insertdata'])) {


        $mesto = $_POST['mesto'];
        $datum_polaska = $_POST['datum_polaska'];
        $datum_povratka = $_POST['datum_povratka'];
        $cena_u_evrima = $_POST['cena_u_evrima'];
        $nacin_prevoza = $_POST['nacin_prevoza'];
        $tip_smestaja = $_POST['tip_smestaja'];
        $naziv_drzave = $_POST['naziv_drzave'];


        $data = array(
            "mesto" => $mesto,
            "datum_polaska" => $datum_polaska,
            "datum_povratka" => $datum_povratka,
            "cena_u_evrima" => $cena_u_evrima,
            "nacin_prevoza" => $nacin_prevoza,
            "tip_smestaja" => $tip_smestaja,
            "id_drzave" => $naziv_drzave
        );

        $aranzman = new Aranzman(null, $mesto, $datum_polaska, $datum_povratka, $cena_u_evrima, $nacin_prevoza, $tip_smestaja, $naziv_drzave);
        $aranzman->insert($conn, $data);
        if ($aranzman) {
            echo "<script> alert('Uspesno ste kreirali novi aranzman.');</script>";
            echo "<script>window.location.href = '../aranzmani/aranzmani.php';</script>";
        } else {
            echo "<script>alert('Kreiranje novog aranzmana nije uspelo.');</script>";
            echo "<script>window.location.href = 'forma.php';</script>";
        }
    }
    ?>
    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-top-bar" id="tm-top-bar">
            <!-- Top Navbar -->
            <div class="container">
                <div class="row">

                    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
                        <a class="navbar-brand logo-text page-scroll" href="../index.php">Magnus</a>
                        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="btn-round-custom" href="../index.php">Pocetna</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn-round-custom" href="../aranzmani/aranzmani.php">Aranzmani</a>
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
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Kreirajte novi aranzman</h1>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
        <div class="tm-section tm-bg-img" id="tm-section-1">
            <div class="tm-bg-white ie-container-width-fix-2">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                            <form action="forma.php" method="post" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <select class="form-control" name="naziv_drzave" id="naziv_drzave" placeholder="Drzava">
                                            <option value="" disabled selected>Drzava</option>
                                            <?php foreach ($drzava as $d) : ?>
                                                <option value="<?php echo $d->id_drzave; ?>">
                                                    <?php echo $d->naziv_drzave; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <input name="mesto" type="text" class="form-control" id="mesto" placeholder="Mesto">
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
                                        <select name="nacin_prevoza" class="form-control tm-select" id="nacin_prevoza">
                                            <option value="">Nacin prevoza</option>
                                            <option value="Autobus">Autobus</option>
                                            <option value="Avion">Avion</option>
                                        </select>
                                        <i class="fa fa-2x fa-user tm-form-element-icon"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <select name="tip_smestaja" class="form-control tm-select" id="tip_smestaja">
                                            <option value="">Tip smestaja</option>
                                            <option value="Hotel *">Hotel *</option>
                                            <option value="Hotel **">Hotel **</option>
                                            <option value="Hotel ***">Hotel ***</option>
                                            <option value="Hotel ****">Hotel ****</option>
                                            <option value="Hotel *****">Hotel *****</option>

                                        </select>
                                        <i class="fa fa-user tm-form-element-icon tm-form-element-icon-small"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <button type="submit" name="insertdata" class="btn btn-success tm-btn-search">Sacuvaj</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>