<?php 
	try{
		$conn=new PDO("mysql:host=localhost;dbname=duantin1;charset=utf8","root","");
	}catch(PDOExeception $e){
		echo "loi";
	}

	// function dd($a){
	// 	echo "<pre style=' background-color: #EEEEEE;
 //  font-family: Consolas,Menlo,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New,monospace,serif;
 //  margin-bottom: 10px;
 //  max-height: 600px;
 //  overflow: auto;
 //  padding: 5px;
 //  width: auto;'>";
	// 	print_r($a);
	// 	echo "</pre>";
	// 	die('die');
	// }
 ?>