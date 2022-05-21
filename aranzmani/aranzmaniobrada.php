<?php 

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
			$query = "INSERT INTO $table (id_aranzmana,mesto,datum_polaska,datum_povratka,cena_u_evrima,nacin_prevoza,tip_smestaja,id_drzave) VALUES ('$data[id_aranzmana]','$data[mesto]','$data[datum_polaska]','$data[datum_povratka]','$data[cena_u_evrima]','$data[nacin_prevoza]','$data[tip_smestaja]','$data[id_drzave]')";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
            }

			if($data['id_aranzmana'] === '' || $data['mesto'] === '' || $data['datum_polaska'] === ''|| $data['datum_povratka'] === '' || $data['cena_u_evrima'] === '' || $data['nacin_prevoza'] === '' || $data['tip_prevoza'] === '' || $data['id_drzave'] === ''){
				$this-> poruka ='Polja moraju biti popunjena';
				
				}else{
				
					$save=$data->query("INSERT INTO predstave(naslov,cena,trajanje,datum_izvodjenja,id_vrste) VALUES ('".$data['naslov']."','".$data['cena']."','".$data['trajanje']."','".$data['datum_izvodjenja']."','".$data['id_vrste']."')") or die($data->error);
					if($save){
						$this -> poruka = 'Uspesno sacuvana predstava';
					}else{
						$this -> poruka = 'Neuspesno sacuvan predstava';
					}
				}
		}           

		public function fetch(mysqli $conn){
			$data = null;

			$query = "SELECT * , d.naziv_drzave FROM drzave d INNER JOIN aranzmani a on (d.id_drzave=a.id_drzave)";
			if ($sql = $conn->query($query)) {
				while ($row = $sql->fetch_array()) {
					$data[] = $row;
				}
			}
			return $data;

			
		}

        public function delete($table, $id, $id_value){

			$query="DELETE FROM $table WHERE $table.$id=$id_value";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
            }
            
        }

        public function update($table, $id_aranzmana, $mesto, $datum_polaska, $datum_povratka, $cena_u_evrima, $nacin_prevoza, $tip_smestaja, $id_drzave){

			$query = "UPDATE $table SET mesto='$mesto', datum_polaska='$datum_polaska', datum_povratka='$datum_povratka', nacin_prevoza='$nacin_prevoza', tip_smestaja='$tip_smestaja', id_drzave='$id_drzave WHERE id_aranzmana='$id_aranzmana'";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

    }
        ?>



            
 