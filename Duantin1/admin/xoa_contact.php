<?php
include 'db.php';
if(isset($_GET['maxoa'])){
	$maxoa=$_GET['maxoa'];
	$sql="delete from contacts where id='$maxoa'";
	$kq=$conn->prepare($sql);
	if($kq->execute()){
		header('location:contact.php');
	}else {
		echo 'lỗi xóa';
	}
}
?>