<?php 
include "../konekcija.php";

	Class Aranzman{

        public function __construct($id_aranzmana,$mesto,$datum_polaska,$datum_povratka,$cena_u_evrima,$nacin_prevoza,$tip_smestaja,$id_drzave)
        {
            $this->id_aranzmana=$id_aranzmana;
            $this->mesto=$mesto;
            $this->datum_polaska=$datum_polaska;
            $this->datum_povratka=$datum_povratka;
            $this->cena_u_evrima=$cena_u_evrima;
            $this->nacin_prevoza=$nacin_prevoza;
            $this->tip_smestaja=$tip_smestaja;
            $this->drzava=$id_drzave;

        }
		
        public function insert($table, $data){
			

			if($data['mesto'] === '' || $data['datum_polaska'] === ''|| $data['datum_povratka'] === '' || $data['cena_u_evrima'] === '' || $data['nacin_prevoza'] === '' || $data['tip_smestaja'] === '' || $data['id_drzave'] === ''){
				$this-> poruka ='Polja moraju biti popunjena';
				
				}else{
				
					$save=$table->query("INSERT INTO aranzmani(mesto,datum_polaska,datum_povratka,cena_u_evrima,nacin_prevoza,tip_smestaja,id_drzave) VALUES ('".$data['mesto']."','".$data['datum_polaska']."','".$data['datum_povratka']."','".$data['cena_u_evrima']."','".$data['nacin_prevoza']."','".$data['tip_smestaja']."','".$data['id_drzave']."')") or die($data->error);
					if($save){
						$this -> poruka = 'Uspesno sacuvan aranzman';
					}else{
						$this -> poruka = 'Neuspesno sacuvan aranzman';
					}
				}
		}           

		public static function fetch(mysqli $conn){
			$data = null;

			$query = "SELECT * , d.naziv_drzave FROM drzave d INNER JOIN aranzmani a on (d.id_drzave=a.id_drzave)";
			if ($sql = $conn->query($query)) {
				while ($row = $sql->fetch_array()) {
					$data[] = $row;
				}
			}
			return $data;
		}

        public function delete($id_aranzmana, mysqli $conn){

			$query="DELETE FROM aranzmani WHERE id_aranzmana='".$id_aranzmana."'";
			$conn->query($query) or die($query);
            
        }
		
		


}
?>


            
 