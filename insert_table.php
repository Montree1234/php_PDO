<?php
	include 'config/pdo_config.php';

	$NAME = 'สมชาย';
	$USERNAME = 'test_pdo1';
	$PASSWORD = 'test_pdo1';
	$TYPE = 'user';

	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = 'INSERT INTO customer (name,username,password,type) VALUES (:p1,:p2,:p3,:p4)';
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':p1',$NAME);
	$stmt->bindParam(':p2',$USERNAME);
	$stmt->bindParam(':p3',$PASSWORD);
	$stmt->bindParam(':p4',$TYPE);

	try {
		$stmt->execute();
		echo 'Inert mysql สำเร็จ';
	} catch (PDOException $e) {
		echo 'ไม่สามารถ Insert mysql'.$e->getMessage();
	}
?>