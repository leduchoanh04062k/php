<?php
include 'db.php';
if(isset($_GET['maxoa'])){
	$maxoa=$_GET['maxoa'];
	$sql="delete from products where id='$maxoa'";
	$kq=$conn->prepare($sql);
	if($kq->execute()){
		header('location:pro.php');
	}else {
		echo 'lỗi xóa';
	}
}
?>