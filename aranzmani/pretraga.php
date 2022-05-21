<?php
  require "../konekcija.php";

  if (isset($_POST['query'])) {
        "SELECT * , d.naziv_drzave FROM drzave d INNER JOIN aranzmani a on (d.id_drzave=a.id_drzave)
                                        WHERE f.mesto LIKE '%{$_POST['query']}%' 
                                        OR f.nacin_prevoza LIKE '%{$_POST['query']}%'
                                        OR f.tip_smestaja LIKE '%{$_POST['query']}%' 
                                        OR f.drzava LIKE '%{$_POST['query']}%'";
                                          
    $result = mysqli_query($conn, $query);
 
  if (mysqli_num_rows($result) > 0) {
    echo '<div class="card">';
      echo '<div class="card-body">';
        echo '<table class="table table-hover" id="aranzmaniTabela">';
          echo '<thead>';
            echo '<tr>';
                echo '<th scope="col"><a class="column_sort" id="id_aranzmani" data-order="desc" href="#">ID</a></th>';
                echo '<th scope="col"><a class="column_sort" id="mesto" data-order="desc" href="#">Mesto</a></th>';
                echo '<th scope="col"><a class="column_sort" id="datum_polaska" data-order="desc" href="#">Datum polaska</a></th>';
                echo '<th scope="col"><a class="column_sort" id="datum_povratka" data-order="desc" href="#">Datum povratka</a></th>';
                echo '<th scope="col"><a class="column_sort" id="cena_u_evrima" data-order="desc" href="#">Cena u evrima</a></th>';
                echo '<th scope="col"><a class="column_sort" id="nacin_prevoza" data-order="desc" href="#">Nacin prevoza</a></th>';
                echo '<th scope="col"><a class="column_sort" id="tip_smestaja" data-order="desc" href="#">Tip smestaja</a></th>';
                echo '<th scope="col">Drzava</th>';
                //echo '<th scope="col">Izmeni</th>';
                //echo '<th scope="col">Obrisi</th>';
            echo '</tr>';
          echo '</thead>' ; 
          while ($aranzman = mysqli_fetch_array($result)){
          echo '<tr>';

            echo '<td>'.$aranzman['id_aranzmana'].'</td>';
            echo '<td>'.$aranzman['mesto'].'</td>';
            echo '<td>'.$aranzman['datum_polaska'].'</td>';
            echo '<td>'.$aranzman['datum_povratka'].'</td>';
            echo '<td>'.$aranzman['cena_u_evrima'].'</td>';
            echo '<td>'.$aranzman['nacin_prevoza'].'</td>';
            echo '<td>'.$aranzman['tip_smestaja'].'</td>';
            echo '<td>'.$aranzman['id_drzave'].'</td>';

    
            /*echo '<td>  
                    <button type="edit" class="btn btn-success editbtn">IZMENI</button>
                  </td>';
            echo  '<td> 
                      <button type="button" class="btn btn-danger deletebtn">OBRISI</button>
                    </td>';*/
          
          echo '</tr>';   
          } 
        echo '</table>';
      echo '</div>';
    echo '</div>';
    } else {
    echo "<h5 style='color:white; text-align:center'>Aranzman nije pronadjen...</h5>";
    }
  } 
?>