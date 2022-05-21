<?php

class Drzava{
    public $id_drzave;
    public $naziv_drzave;

    public function __construct($id_drzave,$naziv_drzave){
        $this->id_drzave=$id_drzave;
        $this->naziv_drzave=$naziv_drzave;
    }
    
    public static function getCountry(mysqli $conn){
        $query="SELECT * FROM drzave";
        $result=$conn->query($query);
        $array=[];
        while($row = $result->fetch_assoc()){
            $drzava=new Drzava($row['id_drzave'],$row['naziv_drzave']);
            array_push($array,$drzava);
            }
        return $array;

    }

}

?>