<?php

include "../konekcija.php";
include "../drzave.php";
include "../aranzmani/aranzmaniobrada.php";

$drzava = Drzava::getCountry($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/tooplate-style.css"> <!-- Templatemo style -->
</head>
<body>
  
<?php
$id_aranzmana = $_REQUEST['id'];
$aranzman = Aranzman::edit($conn ,$id_aranzmana);

if (isset($_POST['update'])) {
    if (isset($_POST['mesto']) && isset($_POST['datum_polaska']) && isset($_POST['datum_povratka']) && isset($_POST['cena_u_evrima']) && isset($_POST['nacin_prevoza']) && isset($_POST['tip_smestaja']) && isset($_POST['naziv_drzave'])) {
      if (!empty($_POST['mesto']) && !empty($_POST['datum_polaska']) && !empty($_POST['datum_povratka']) && !empty($_POST['cena_u_evrima']) && !empty($_POST['nacin_prevoza']) && !empty($_POST['tip_smestaja']) && !empty($_POST['naziv_drzave']) ) {
        
        $data['id_aranzmana'] = $_POST['id_aranzmana'];
        $data['mesto'] = $_POST['mesto'];
        $data['datum_polaska'] = $_POST['datum_polaska'];
        $data['datum_povratka'] = $_POST['datum_povratka'];
        $data['cena_u_evrima'] = $_POST['cena_u_evrima'];
        $data['nacin_prevoza'] = $_POST['nacin_prevoza'];
        $data['tip_smestaja'] = $_POST['tip_smestaja'];
        $data['naziv_drzave'] = $_POST['naziv_drzave'];

   //     $js_code = 'console. log(' . json_encode($data, JSON_HEX_TAG);
   $output = implode(',', $data);

   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";        $update = Aranzman::update($conn, $data);

        if($update){
          echo "<script> alert('record update successfully');</script>";
          echo "<script>window.location.href = '../aranzmani/aranzmani.php';</script>";
        }else{
          echo "<script>alert('record update failed');</script>";
          echo "<script>window.location.href = '../aranzmani/aranzmani.php';</script>";
        }

      }else{
        echo "<script>alert('empty');</script>";
        header("Location: edit.php?id=");
      }
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
                                    <a class="btn-round-custom" href="#">Pretraga</a>
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
                            <form action="edit.php" method="post" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <select class="form-control" name="naziv_drzave" id="naziv_drzave">                                      
                                        <option value="" disabled selected><?php echo $aranzman['naziv_drzave']; ?></option>
                                        <?php foreach($drzava as $d): ?>
                                           <option value="<?php echo $d->naziv_drzave;?>">
                                          <?php echo $d->naziv_drzave;?>
                                       </option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <input name="id_aranzmana" type="text" class="form-control" id="id_aranzmana" value=<?php echo $aranzman['id_aranzmana']; ?>>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <input name="mesto" type="text" class="form-control" id="mesto" value=<?php echo $aranzman['mesto']; ?>>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                        <input name="datum_polaska" type="text" class="form-control" id="datum_polaska" value=<?php echo $aranzman['datum_polaska']; ?>>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                        <input name="datum_povratka" type="text" class="form-control" id="datum_povratka" value=<?php echo $aranzman['datum_povratka']; ?>>
                                    </div>
                                </div>
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                        <input name="cena_u_evrima" type="text" class="form-control" id="cena_u_evrima" value=<?php echo $aranzman['cena_u_evrima']; ?>>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <select name="nacin_prevoza" class="form-control tm-select" id="nacin_prevoza" value=<?php echo $aranzman['nacin_prevoza']; ?>>
                                            <option value=""><?php echo $aranzman['nacin_prevoza']; ?></option>
                                            <option value="Autobus">Autobus</option>
                                            <option value="Avion">Avion</option>
                                        </select>
                                        <i class="fa fa-2x fa-user tm-form-element-icon"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <select name="tip_smestaja" class="form-control tm-select" id="tip_smestaja">
                                            <option value=""><?php echo $aranzman['tip_smestaja']; ?></option>
                                            <option value="Hotel *">Hotel *</option>
                                            <option value="Hotel **">Hotel **</option>
                                            <option value="Hotel ***">Hotel ***</option>
                                            <option value="Hotel ****">Hotel ****</option>
                                            <option value="Hotel *****">Hotel *****</option>
                                        </select>
                                        <i class="fa fa-user tm-form-element-icon tm-form-element-icon-small"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <button type="submit" name="update" class="btn btn-primary tm-btn-search">
                                            <a href="../aranzmani/aranzmani.php">Sacuvaj</a>
                                        </button>
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