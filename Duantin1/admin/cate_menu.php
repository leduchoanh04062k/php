<?php 
include 'db.php';
if (isset($_POST['show_menu'])) {
	$id=$_POST['id'];
	$show_menu= displayStatusForSlide($_POST['show_menu']);
	$sql="update categories set show_menu = $show_menu where id = $id";
	$kq=$conn->prepare($sql);
	if ($kq->execute()) {
		header("Location:cate.php");
	}else{
		echo"Loi";
	}
}

function displayStatusForSlide($show_menu){
	return ($show_menu == 'ON') ? 0 : 1;

    // example
    // if ($status == 'ON') {
    // 	return 0;
    // }else{
    // 	return 1;
    // }
}
?>