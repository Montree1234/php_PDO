<?php
	include 'config/pdo_config.php';

	$sql = 'select * from customer';
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);
	
	try{
		$stmt->execute();
		echo 'ติดต่อ mysql สำเร็จ';
	} catch (PDOException $e){
		echo 'ไม่สามารถติดต่อ mysql'.$e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		table,th,td{
			border:1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h2>รายการ</h2>
	<table style="width:900px">
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>USERNAME</td>
			<td>PASSWORD</td>
		</tr>
		<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
		</tr>
		<?php } 
			//close connection
			$dbh = null;
		?>
	</table> 
</body>
</html>