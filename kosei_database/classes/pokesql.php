<?php

include 'database.php';

class SQL extends Database{

public function insertPokemon($pname,$height,$weight,$abi,$pic,$text){

$sql1="INSERT INTO pokedex (name,height,weight,ability,text)value('$pname','$height','$weight','$abi','$text')";

		if($this->conn->query($sql1)){

		$sql2="INSERT INTO pic(image,name) value('$pic','$pname')";
				 
		    if($this->conn->query($sql2)){
					 
					return 1;
				}
				else{

					return 0;
				}
		}

		else{
			echo"error.".$this->conn->error;
		}

}

public function showData($pname,$height,$weight,$abi){

$sql1="SELECT * FROM Pokedex INNER JOIN pic where Pokedex.ability='$abi' or Pokedex.name='$pname' or Pokedex.height='$height' or Pokedex.weight='$weight' ";	
$rows1=array();
$result=$this->conn->query($sql1);

if($result->num_rows>0){

	while($row1=$result->fetch_assoc()){
     $rows1[]=$row1;
	}

   return $rows1;
}




}

}

?>