<?php
include "konekcija.php";
include "aranzmani/aranzmaniobrada.php";
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  < <link rel="stylesheet" href="css/izgled.css">
    <link rel="stylesheet" href="forma/css/bootstrap.min.css">
    <title>CHESS</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
    <a class="navbar-brand logo-text page-scroll" href="index.php">Magnus</a>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="btn-round-custom" href="#">Pocetna</a>
        </li>
        <li class="nav-item">
          <a class="btn-round-custom" href="aranzmani/aranzmani.php">Aranzmani</a>
        </li>
        <li class="nav-item">
          <a class="btn-round-custom" href="#callMe">Kontakt</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php

  $id_aranzmana = $_REQUEST['id'];
  $row = Aranzman::fetch_single($conn, $id_aranzmana);
  if (!empty($row)) {

  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center"> <?php echo $row['mesto']; ?>, <?php echo $row['naziv_drzave']; ?></h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto  d-flex justify-content-center">
          <div id="jedanAranzman" class="card">
            <div id="podaci" class="card-header">
              Podaci o aranzmanu
            </div>
            <div class="card-body">
              <p>Drzava = <?php echo $row['naziv_drzave']; ?></p>
              <p>Mesto = <?php echo $row['mesto']; ?></p>
              <p>Datum polaska = <?php echo $row['datum_polaska']; ?></p>
              <p>Datum povratka = <?php echo $row['datum_povratka']; ?></p>
              <p>Cena = <?php echo $row['cena_u_evrima']; ?></p>
              <p>Nacin prevoza = <?php echo $row['nacin_prevoza']; ?></p>
              <p>Tip smestaja = <?php echo $row['tip_smestaja']; ?></p>


            </div>
          </div>
        <?php
      } else {
        echo "no data";
      }
        ?>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>