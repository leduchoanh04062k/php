<?php 
function dd($var){
	echo "<pre>";
	var_dump($var);
	die;
}
function getImage($path, $url){
	return "admin/images/".$path."/".$url."";
}
 ?>