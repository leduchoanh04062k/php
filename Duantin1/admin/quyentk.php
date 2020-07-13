<?php 
	include 'db.php';
	if (isset($_GET['id_quyen'])) {
		$id_quyen=$_GET['id_quyen'];
		$sql="select * from users where id='$id_quyen'";
		$kq=$conn-> query($sql)-> fetch();
		if ($kq["roles"] == 1) {
			$splq="update users set roles = 0 where id='$id_quyen'";
			$kqq = $conn-> query($splq);
			if ($kqq == true) {
				header("location:user.php");
			}
		}else{
			$splq="update users set roles = 1 where id='$id_quyen'";
			$kqq = $conn-> query($splq);
			if ($kqq == true) {
				header("location:user.php");
			}
		}
	}
 ?>