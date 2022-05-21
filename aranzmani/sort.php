<?php  
//include "../konekcija.php";
include "aranzmani.php";

$connect = mysqli_connect("localhost", "root", "", "turisticka_agencija");  

 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * , d.naziv_drzave FROM drzave d INNER JOIN aranzmani a on (d.id_drzave=a.id_drzave)
           ORDER BY a.id_aranzmana DESC";  
 $result = mysqli_query($conn, $query);  
 $output .= '  
 <table class="table" id="aranzmaniTabela">
     <thead>
          <tr>
               <th><a class="column_sort" id="id_aranzmana" data-order="'.$order.'" href="#">ID</a></th>
               <th><a class="column_sort" id="mesto" data-order="'.$order.'" href="#">Mesto</a></th>
               <th><a class="column_sort" id="datum_polaska" data-order="'.$order.'" href="#">Datum polaska</a></th>
               <th><a class="column_sort" id="datum_povratka" data-order="'.$order.'" href="#">Datum povratka</a></th>
               <th><a class="column_sort" id="cena_u_evrima" data-order="'.$order.'" href="#">Cena u evrima</a></th> 
               <th><a class="column_sort" id="nacin_prevoza" data-order="'.$order.'" href="#">Nacin prevoza</a></th> 
               <th><a class="column_sort" id="tip_smestaja" data-order="'.$order.'" href="#">Tip smestaja</a></th> 

               <th>Drzava</th>
               <th>Izmeni</th>
               <th>Obrisi</th>
          </tr>
     </thead>
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
     <tbody id="myTable">
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
                    <button type="edit" class="btn btn-success editbtn">IZMENI</button>
               </td>
               <td> 
                    <button type="button" class="btn btn-danger deletebtn">OBRISI</button>
               </td>

          </tr>
                        
                        
     </tbody>
      ';  
 }
 
 
 $output .= '</table>';  
 echo $output;  
 ?>  