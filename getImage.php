<?php
	header("Content-type: image/jpg");
	$id = $_GET['id'];
  	// do some validation here to ensure id is safe

  	$veza = new PDO("mysql:dbname=tut9;host=localhost;charset=utf8", "root", "root");
    $veza->exec("set names utf8");
  	$result = $veza->query("SELECT slika FROM vijest WHERE id=$id");
  	
  	foreach ($result as $vijest) {
  		echo $vijest['slika'];
  	}

?>