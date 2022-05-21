<?php
require "../konekcija.php";
require "aranzmaniobrada.php";

session_start();

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>

<?php


    $model = new Aranzman('id_aranzmana','mesto','datum_polaska','datum_povratka','cena_u_evrima','nacin_prevoza','tipe_smestaja','id_drzave');
    
    
    if (isset($_POST['insertdata'])) {
        if (isset($_POST['id_aranzmana']) && isset($_POST['mesto']) && isset($_POST['datum_polaska']) && isset($_POST['datum_povratka']) && isset($_POST['cena_u_evrima'])&& isset($_POST['nacin_prevoza'])&& isset($_POST['tip_prevoza'])&& isset($_POST['id_drzave']) ) {
            if (!empty($_POST['id_aranzmana']) && !empty($_POST['mesto']) && !empty($_POST['datum_polaska']) && !empty($_POST['datum_povratka'])&& !empty($_POST['cena_u_evrima']) && !empty($_POST['nacin_prevoza']) && !empty($_POST['tip_prevoza']) && !empty($_POST['id_drzave']) ) {
                    
                $data['id_aranzmana'] = $_POST['id_aranzmana'];
                $data['mesto'] = $_POST['mesto'];
                $data['datum_polaska'] = $_POST['datum_polaska'];
                $data['datum_povratka'] = $_POST['datum_povratka'];
                $data['cena_u_evrima'] = $_POST['cena_u_evrima'];
                $data['nacin_prevoza'] = $_POST['nacin_prevoza'];
                $data['tip_smestaja'] = $_POST['tip_smestaja'];
                $data['id_drzave'] = $_POST['id_drzave'];


                $insert = $model->insert('aranzman',$data);

                if($insert){
                    echo "<script>alert('Film je uspesno dodat!');</script>";
                    echo "<script>window.location.href = 'aranzmani.php';</script>";
                }else{
                    echo "<script>alert('Greska prilikom dodavanja filma!');</script>";
				    echo "<script>window.location.href = 'aranzmani.php';</script>";
                }
            }else{
                echo "<script>alert('Sva polja su obavezna. Pokusajte ponovo!');</script>";
                echo "<script>window.location.href = 'aranzmani.php';</script>";
            }
        }
    }
	
	if(isset($_POST['deletedata'])){

		$id=$_POST['fdelete_id'];
		$delete = $model->delete("aranzmani",'id',$id);
		
		if ($delete) {
            echo "<script>alert('Film je uspesno obrisan');</script>";
			echo "<script>window.location.href = 'aranzmani.php';</script>";
		}
    }
  
    
    if (isset($_POST['updatedata'])) {
        if (isset($_POST['id_aranzmana']) && isset($_POST['mesto']) && isset($_POST['datum_polaska']) && isset($_POST['datum_povratka']) && isset($_POST['cena_u_evrima'])&& isset($_POST['nacin_prevoza'])&& isset($_POST['tip_prevoza'])&& isset($_POST['id_drzave']) ) {
            if (!empty($_POST['id_aranzmana']) && !empty($_POST['mesto']) && !empty($_POST['datum_polaska']) && !empty($_POST['datum_povratka'])&& !empty($_POST['cena_u_evrima']) && !empty($_POST['nacin_prevoza']) && !empty($_POST['tip_prevoza']) && !empty($_POST['id_drzave']) ) {
                $id_aranzmana = $_POST['fupdate_id'];
                $data['id_aranzmana'] = $_POST['id_aranzmana'];
                $data['mesto'] = $_POST['mesto'];
                $data['datum_polaska'] = $_POST['datum_polaska'];
                $data['datum_povratka'] = $_POST['datum_povratka'];
                $data['cena_u_evrima'] = $_POST['cena_u_evrima'];
                $data['nacin_prevoza'] = $_POST['nacin_prevoza'];
                $data['tip_smestaja'] = $_POST['tip_smestaja'];
                $data['id_drzave'] = $_POST['id_drzave'];
            
                    $update = $model->update('arazmani', $id_aranzmana, $mesto, $datum_polaska, $datum_povratka, $cena_u_evrima, $nacin_prevoza, $tip_smestaja, $id_drzave);
            
                    if($update){
                        echo "<script>alert('Film je uspesno izmenjen!');</script>";
                        echo "<script>window.location.href = 'aranzmani.php';</script>";
                    }else{
                        echo "<script>alert('Greska prilikom izmene filma!');</script>";
                        echo "<script>window.location.href = 'aranzmani.php';</script>";
                    }
            
            }else{
                echo "<script>alert('Sva polja su obavezna. Pokusajte ponovo!');</script>";
                echo "<script>window.location.href = 'aranzmani.php';</script>";
            }
        }
            
    }     

?>

 <!-- Page Preloder -->
 <div id="preloder">
        <div class="loader"></div>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
   <a class="navbar-brand logo-text page-scroll" href="index.html">Magnus</a>
   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn-round-custom" href="../index.php">Pocetna</a>
                </li>
                <li class="nav-item">
                    <a class="btn-round-custom" href="#">Aranzmani</a>
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

    <section class="hero set-bg" data-setbg="img/blue.jpg">

    <div class="container">
    
        
                
        <!-- ZA PRETRAZIVANJE-->
        <div class="md-form active-pink active-pink-2 mb-3">
            <input class="form-control search" type="text" id="filmInput" onkeyup="myFunction()" placeholder="Pretrazite filmove">
        </div>
                
        <div id="output"></div>
        <br>
                
        <?php
                    
            $result = $model->fetch($conn);
        ///    $query = "SELECT * , d.naziv_drzave FROM drzave d INNER JOIN aranzmani a on (d.id_drzave=a.id_drzave) ORDER BY id_aranzmana ASC";
        //    $result = mysqli_query($conn, $query);

        ?>
        <div class="table-responsive" id="tabela">
            <div class="card-body">
                    <table class="table table-hover" id="aranzmaniTabela">
                        <thead>
                            <tr>
                                <th scope="col"><a class="column_sort" id="id_aranzmana" data-order="desc" href="#">ID</a></th>
                                <th scope="col"><a class="column_sort" id="mesto" data-order="desc" href="#">Mesto</a></th>
                                <th scope="col"><a class="column_sort" id="datum_polaska" data-order="desc" href="#">Datum polaska</a></th>
                                <th scope="col"><a class="column_sort" id="datum_povratka" data-order="desc" href="#">Datum povratka</a></th>
                                <th scope="col"><a class="column_sort" id="cena" data-order="desc" href="#">Cena u evrima</a></th> 
                                <th scope="col"><a class="column_sort" id="nacin_prevoza" data-order="desc" href="#">Nacin prevoza</a></th> 
                                <th scope="col"><a class="column_sort" id="tip_smestaja" data-order="desc" href="#">Tip prevoza</a></th> 
                                <th scope="col">Drzava</th>

                                <th scope="col">Izmeni</th>
                                <th scope="col">Obrisi</th>
                            </tr>
                        </thead>
             
                        <tbody>
                        <?php
                    if(!empty($result)){
                    foreach($result as $row)
                    {
                        
                ?>
                    <tbody id="myTable">
                        <tr>
                        
                        <td> <?php echo $row['id_aranzmana']; ?> </td>
                        <td> <?php echo $row['mesto']; ?> </td>
                        <td> <?php echo $row['datum_polaska']; ?> </td>
                        <td> <?php echo $row['datum_povratka']; ?> </td>
                        <td> <?php echo $row['cena_u_evrima']; ?> </td>
                        <td> <?php echo $row['nacin_prevoza']; ?> </td>
                        <td> <?php echo $row['tip_smestaja']; ?> </td>
                        <td> <?php echo $row['naziv_drzave']; ?> </td>

                        <td> 
                            <button type="edit" class="btn btn-success editbtn">IZMENI</button>
                        </td>
                        <td> 
                            <button type="button" class="btn btn-danger deletebtn">OBRISI</button>
                        </td>

                        </tr>
                        <tr>
                        
                    </tbody>
                <?php
                    }
                }else{
                    echo "no data";
                    }
                ?>
                    </table>
            </div>
       </div>
    </div>
</section>

<script>
$(document).ready(function(){
    $(document).on('click', '.column_sort', function(){
        var column_name = $(this).attr("id_aranzmana");
        var order = $(this).data("order");
        var arrow = '';
        if(order == 'desc')
        {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
        } 
        else 
        {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
        }
        $.ajax({
            url: "sort.php",
            method:"POST",
            data:{column_name:column_name, order:order},
            success:function(data)
            {
                $('#aranzmaniTabela').html(data);
                $('#'+column_name+'').append(arrow);
            }
        })
    });
});
</script>
</body>
</html>

