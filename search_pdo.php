<?php
	include "config/pdo_config.php";

	$search = $_POST['search'];
	

	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = 'SELECT * FROM customer WHERE name LIKE :p1'; 
	$stmt = $dbh->prepare($sql); //$stmt = $dbh->prepare('select * form customer where name LIKE :p1');
	$search2 = '%'.$search.'%';
	$stmt->bindParam(':p1',$search2);
	

	try {
		$stmt->execute();
		
		while ($row = $stmt->fetchObject()){
			
			echo 'ID : '.$row->id.'<br>';
			echo 'NAME : '.$row->name.'<br>';
			echo 'USERNAME : '.$row->username.'<br>';
			echo 'LNAME : '.$row->password.'<br>';
			echo 'TYPE : '.$row->type.'<br>';
			echo '<hr>';

		}
		echo 'จำนวนค้นหา : '.$stmt->rowCount();
		
	} catch (PDOException $e) {
		echo 'ไม่สามารถ Show Data'.$e->getMessage();
	}
?>