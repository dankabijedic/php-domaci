<?php


$connect = mysqli_connect("localhost:3307", "root", "", "turisticka_agencija");

$output = '';
$order = $_POST["order"];
if ($order == 'desc') {
    $order = 'asc';
} else {
    $order = 'desc';
}
$query = "SELECT * , d.naziv_drzave FROM drzave d INNER JOIN aranzmani a on (d.id_drzave=a.id_drzave)
           ORDER BY " . $_POST["column_name"] . "  " . $_POST["order"] . "";
$result = mysqli_query($connect, $query);
$output .= '  
 <table class="table table-hover" id="aranzmaniTabela">
 <thead>
     <tr>
         <th scope="col"><a class="column_sort" id="id_aranzmana" data-order="' . $order . '" href="#">ID</a></th>
         <th scope="col"><a class="column_sort" id="mesto" data-order="' . $order . '" href="#">Mesto</a></th>
         <th scope="col"><a class="column_sort" id="datum_polaska" data-order="' . $order . '" href="#">Datum polaska</a></th>
         <th scope="col"><a class="column_sort" id="datum_povratka" data-order="' . $order . '" href="#">Datum povratka</a></th>
         <th scope="col"><a class="column_sort" id="cena_u_evrima" data-order="' . $order . '" href="#">Cena u evrima</a></th> 
         <th scope="col"><a class="column_sort" id="nacin_prevoza" data-order="' . $order . '" href="#">Nacin prevoza</a></th> 
         <th scope="col"><a class="column_sort" id="tip_smestaja" data-order="' . $order . '" href="#">Tip prevoza</a></th> 
         <th scope="col"><a class="column_sort" id="tip_smestaja" data-order="' . $order . '" href="#">Drzava</th>

         <th scope="col">Izmeni</th>
         <th scope="col">Obrisi</th>
         <th scope="col">Prikazi</th>

     </tr>
 ';
while ($row = mysqli_fetch_array($result)) {
    $output .= '  
          <tr>
                        
               <td>' . $row['id_aranzmana'] . '</td>
               <td>' . $row['mesto'] . '</td>
               <td>' . $row['datum_polaska'] . '</td>
               <td>' . $row['datum_povratka'] . '</td>
               <td>' . $row['cena_u_evrima'] . '</td>
               <td>' . $row['nacin_prevoza'] . '</td>
               <td>' . $row['tip_smestaja'] . '</td>
               <td>' . $row['naziv_drzave'] . '</td>
               
           
               <td> 
               <button type="edit" data-role="update" class="btn btn-success editbtn">IZMENI</button>
           </td>
           <td> 
               <button type="button" class="btn btn-danger deletebtn">OBRISI</button>
           </td>
           <td>
           <button type="button" class="btn btn-success readbtn">
               <a href="../read.php?id=' . $row['id_aranzmana'] . '">PRIKAZI</a>
           </button>
       </td>

          </tr>
                        
                        

      ';
}


$output .= '</table>';
echo $output;
