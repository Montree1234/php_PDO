<?php
	include 'config/pdo_config.php';

	$ID = '16';
	

	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = 'DELETE FROM customer WHERE id=:p1';
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':p1',$ID);

	try {
		$stmt->execute();
		echo 'Delete mysql สำเร็จ';
	} catch (PDOException $e) {
		echo 'ไม่สามารถ Delete mysql'.$e->getMessage();
	}
?>