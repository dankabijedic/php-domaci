<?php
require "../konekcija.php";
require "aranzmaniobrada.php";
include "../drzave.php";
session_start();

$drzava = Drzava::getCountry($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aranzmani</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../forma/css/bootstrap.min.css" type="text/css">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

    <?php


    $model = new Aranzman('id_aranzmana', 'mesto', 'datum_polaska', 'datum_povratka', 'cena_u_evrima', 'nacin_prevoza', 'tip_smestaja', 'id_drzave');


    if (isset($_POST['insertdata'])) {
        if (isset($_POST['id_aranzmana']) && isset($_POST['mesto']) && isset($_POST['datum_polaska']) && isset($_POST['datum_povratka']) && isset($_POST['cena_u_evrima']) && isset($_POST['nacin_prevoza']) && isset($_POST['tip_smestaja']) && isset($_POST['id_drzave'])) {
            if (!empty($_POST['id_aranzmana']) && !empty($_POST['mesto']) && !empty($_POST['datum_polaska']) && !empty($_POST['datum_povratka']) && !empty($_POST['cena_u_evrima']) && !empty($_POST['nacin_prevoza']) && !empty($_POST['tip_smestaja']) && !empty($_POST['id_drzave'])) {

                $data['id_aranzmana'] = $_POST['id_aranzmana'];
                $data['mesto'] = $_POST['mesto'];
                $data['datum_polaska'] = $_POST['datum_polaska'];
                $data['datum_povratka'] = $_POST['datum_povratka'];
                $data['cena_u_evrima'] = $_POST['cena_u_evrima'];
                $data['nacin_prevoza'] = $_POST['nacin_prevoza'];
                $data['tip_smestaja'] = $_POST['tip_smestaja'];
                $data['id_drzave'] = $_POST['id_drzava'];



                $insert = $model->insert('aranzman', $data);

                if ($insert) {
                    echo "<script>alert('Film je uspesno dodat!');</script>";
                    echo "<script>window.location.href = 'aranzmani.php';</script>";
                } else {
                    echo "<script>alert('Greska prilikom dodavanja filma!');</script>";
                    echo "<script>window.location.href = 'aranzmani.php';</script>";
                }
            } else {
                echo "<script>alert('Sva polja su obavezna. Pokusajte ponovo!');</script>";
                echo "<script>window.location.href = 'aranzmani.php';</script>";
            }
        }
    }

    if (isset($_POST['deletedata'])) {

        $id_aranzmana = $_POST['delete_id'];
        $delete = $model->delete($id_aranzmana, $conn);

        if ($delete) {
            echo "<script>alert('Film je uspesno obrisan');</script>";
            echo "<script>window.location.href = 'aranzmani.php';</script>";
        }
    }

    ?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand logo-text page-scroll" href="index.php">Magnus</a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn-round-custom" href="../index.php">Pocetna</a>
                </li>
                <li class="nav-item">
                    <a class="btn-round-custom" href="#">Aranzmani</a>
                </li>
                <li class="nav-item">
                    <a class="btn-round-custom" href="#callMe">Kontakt</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="hero set-bg" data-setbg="img/blue.jpg">

        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1 class="text-center">ARANZMANI</h1>
                    <hr style="height: 1px;color: black;background-color: black;">
                </div>
                <?php
                $result = $model->fetch($conn);
                ?>
                <br>

                <!-- ZA PRETRAZIVANJE-->
                <div class="md-form active-pink active-pink-2 mb-3 text-center">
                    <input class="form-control search" type="text" id="aranzmanInput" onkeyup="myFunction()" placeholder="Pretrazite aranzmane">
                </div>

                <div id="output"></div>
                <br>
                <div class="table-responsive" id="tabela">
                    <div class="card-body">
                        <table class="table table-hover" id="aranzmaniTabela">
                            <thead>
                                <tr>
                                    <th scope="col"><a class="column_sort" id="id_aranzmana" data-order="desc" href="#">ID</a></th>
                                    <th scope="col"><a class="column_sort" id="mesto" data-order="desc" href="#">Mesto</a></th>
                                    <th scope="col"><a class="column_sort" id="tip_smestaja" data-order="desc" href="#">Drzava</th>
                                    <th scope="col"><a class="column_sort" id="datum_polaska" data-order="desc" href="#">Datum polaska</a></th>
                                    <th scope="col"><a class="column_sort" id="datum_povratka" data-order="desc" href="#">Datum povratka</a></th>
                                    <th scope="col"><a class="column_sort" id="cena_u_evrima" data-order="desc" href="#">Cena u evrima</a></th>
                                    <th scope="col"><a class="column_sort" id="nacin_prevoza" data-order="desc" href="#">Nacin prevoza</a></th>
                                    <th scope="col"><a class="column_sort" id="tip_smestaja" data-order="desc" href="#">Tip smestaja</a></th>

                                    <th scope="col">
                                        <a href="../edit/edit.php">Izmeni</a>
                                    </th>
                                    <th scope="col">Obrisi</th>
                                    <th scope="col">Prikazi</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (!empty($result)) {
                                    foreach ($result as $row) {

                                ?>
                            <tbody id="myTable">
                                <tr id="<?php echo $row['id_aranzmana'] ?>">

                                    <td data-target="id_aranzmana"> <?php echo $row['id_aranzmana']; ?> </td>
                                    <td data-target="mesto"> <?php echo $row['mesto']; ?> </td>
                                    <td data-target="naziv_drzave"> <?php echo $row['naziv_drzave']; ?> </td>
                                    <td data-target="datum_polaska"> <?php echo $row['datum_polaska']; ?> </td>
                                    <td data-target="datum_povratka"> <?php echo $row['datum_povratka']; ?> </td>
                                    <td data-target="cena_u_evrima"> <?php echo $row['cena_u_evrima']; ?> </td>
                                    <td data-target="nacin_prevoza"> <?php echo $row['nacin_prevoza']; ?> </td>
                                    <td data-target="tip_smestaja"> <?php echo $row['tip_smestaja']; ?> </td>

                                    <td>
                                        <button type="button" data-id="<?php echo $row['id_aranzmana']; ?>" data-role="update" class="btn btn-success editbtn">
                                            <a href="../edit/edit.php?id=<?php echo $row['id_aranzmana']; ?>">IZMENI</a>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deletebtn">OBRISI</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success readbtn">
                                            <a href="../read.php?id=<?php echo $row['id_aranzmana']; ?>">PRIKAZI</a>
                                        </button>
                                    </td>
                                </tr>
                                <tr>

                            </tbody>
                    <?php
                                    }
                                } else {
                                    echo "no data";
                                }
                    ?>
                        </table>
                        <div class="container bg-light">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-success">
                                    <a href="../forma/forma.php">Kreiraj novi aranzman</a>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>

    <!-- ################################# FORMA ZA BRISANJE POSTOJECEG #################################################### -->

    <div class="modal fade" id="aranzmanDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Brisanje aranzmana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="aranzmani.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">
                        <h6>Da li ste sigurni da želite da obrišete izabrani aranzman?</h6>

                    </div>

                    <div class="modal-footer">
                        <button type="button" name="canceldelete" class="btn btn-secondary" data-dismiss="modal">NE</button>
                        <button type="submit" name="deletedata" class="btn btn-primary">DA</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $(document).on('click', '.column_sort', function() {
                var column_name = $(this).attr("id");
                var order = $(this).data("order");

                $.ajax({
                    url: "sort.php",
                    method: "POST",
                    data: {
                        column_name: column_name,
                        order: order
                    },
                    success: function(data) {
                        $('#aranzmaniTabela').html(data);
                    }
                })
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#aranzmaniTabela').on('click', '.deletebtn', function(event) {
                $('#aranzmanDeleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {

                    return $(this).text();

                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("aranzmanInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("aranzmaniTabela");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>