<?php
	include 'config/pdo_config.php';

	$ID = '16';
	$NAME = 'สมชาย3';
	$USERNAME = 'test_pdo1';
	$PASSWORD = 'test_pdo1';
	$TYPE = 'user';

	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = 'UPDATE customer SET name=:p1,username=:p2,password=:p3,type=:p4 WHERE id=:p5';
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':p1',$NAME);
	$stmt->bindParam(':p2',$USERNAME);
	$stmt->bindParam(':p3',$PASSWORD);
	$stmt->bindParam(':p4',$TYPE);
	$stmt->bindParam(':p5',$ID);

	try {
		$stmt->execute();
		echo 'Update mysql สำเร็จ';
	} catch (PDOException $e) {
		echo 'ไม่สามารถ Update mysql'.$e->getMessage();
	}
?>