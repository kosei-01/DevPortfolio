<?php

include 'classes/pokesql.php';
$poke= NEW SQL();

	if(isset($_POST['upload'])){
		$pic=$_FILES["pic"]["name"];
		
		$pname=$_POST["pname"];
		$height=$_POST["height"];
		$weight=$_POST["weight"];
		$abi=$_POST["ability"];
    $text=$_POST["text"];
		
		$target_dir="img/";
		$target_file=$target_dir . basename($_FILES["pic"]["name"]);
    
		$ans=$poke->insertPokemon($pname,$height,$weight,$abi,$pic,$text);
		
		if($ans==1){
			move_uploaded_file($_FILES["pic"]["tmp_name"],$target_file);

			header("Location:admin.php");
      
		}

		else{
			echo"error";
		}
	}

 elseif(isset($_POST["register"])){
	
	// $loginid=$_POST["id"];
	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$bday=$_POST["bday"];
	$gender=$_POST["gender"];
	
	
   $poke->InsertUserdata($uname,$email,$pass,$bday,$gender);
 }

 elseif(isset($_POST["login"])){
	 session_start();

	$pass=$_POST["pass"];
	$email=$_POST["email"];
	
   $poke->SearchUser($pass,$email);
 }

 elseif(isset($_POST["send"])){
   
	$pname=$_POST["pname"];
	$message=$_POST["message"];
	
	$poke->InsertOpinion($pname,$message);
 }

 elseif(isset($_POST["update"])){
	
	$uname=$_POST["uname"];	 
	$pass=$_POST["pass"];	 
	$email=$_POST["email"];	 

	$poke->updateData($uname,$pass,$email);
 }

 elseif(isset($_POST["post"])){
	 $uname=$_POST["uname"];
	 $comment=$_POST["comment"];

   $poke->InsertComment($uname,$comment);
 }

 



?>




