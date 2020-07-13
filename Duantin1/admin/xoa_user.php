<?php
include 'db.php';
if(isset($_GET['maxoa'])){
	$maxoa=$_GET['maxoa'];
	$sql="delete from users where id='$maxoa'";
	$kq=$conn->prepare($sql);
	if($kq->execute()){
		header('location:user.php');
	}else {
		echo 'lỗi xóa';
	}
}
?>