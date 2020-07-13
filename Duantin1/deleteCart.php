<?php 
session_start();
require_once './commons/helpers.php';
require_once './commons/constants.php';
require_once './commons/db.php';
	$cart = $_SESSION[CART];
	$productId = $_GET["id"];

	if(isset($productId)){

		foreach ($cart as $index => $item) {
			if($item['id'] == $productId){
				unset($_SESSION[CART][$index]);
				header('location: ' . BASE_URL); 
			}
		}

	}else{
		die('khong co san pham trong gio hang');
	}
?>