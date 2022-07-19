<?php
	include_once 'model/Database.php';
	$db = new Database();

	// INSERT DATA
	$name = 'Economy';
	$db->query("INSERT INTO categories(category_name) VALUES(?)");
	$db->bind(1,$name);
	if($db->execute()){
		echo 'Result add recorded...';
	}
	
 // FETCH ALL DATA
  $db->query("SELECT * FROM categories");
	$data = $db->resultSet();
	foreach($data as $row){
	  	echo $row['category_name'].'<br/>';
	}

	// FETCH SINGLE DATA
	$db->query("SELECT * FROM categories ORDER BY category_id desc");
	$row = $db->single();
	echo $row['category_name'];
