<?php 
// tạo ra kết nối đến csdl
function getConnect(){
	$host = "127.0.0.1";
	$dbname = "duantin1";
	$dbusername = "root";
	$dbpwd = "";
	try{
		
		// đoạn code có khả năng gây(bị) lỗi
		$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);

	}catch(Exception $ex){
		var_dump($ex->getMessage());
		die;
	}
	return $connect;
}
function executeQuery($sqlQuery, $getAll = false){
	// tạo kết nối đến csdl
	$conn = getConnect();
	// nạp câu lệnh sql từ tham số vào kết nối
	$stmt = $conn->prepare($sqlQuery);
	// thực thi câu lệnh với csdl
	$stmt->execute();
	// lấy dữ liệu đc trả về từ csdl và gán cho biến $result
	$result = $stmt->fetchAll();
	if(!$result){
		return null;
	}
	if($getAll){
		return $result;
	}
	return $result[0];
}
function fetchTable($query,$getAll = false){
    $connect = getConnect();
    $stmt = $connect-> prepare($query);
    $stmt -> execute();
    
    $result = $stmt -> fetch();
    if($result == null){
        return null;
    }
    if($getAll){
        return $result;
    }
    return $result[0];
};

function fetchId($table,$id){
    $connect = getConnect();
    $stmt = $connect-> prepare("SELECT * FROM {$table} WHERE id=$id");
    $stmt -> execute();

    $result =  $stmt -> fetch();
    
    return $result;
};

function update($query){
    $connect = getConnect();
    $stmt = $connect-> prepare($query);
    
    $result =  $stmt -> execute();
    
    return $result;
};
function delete($table,$id){
    $connect = getConnect();
    $stmt = $connect->prepare( "DELETE FROM {$table} WHERE id=$id ");
    $result = $stmt -> execute();

    return $result;
};
function execQueryOrder($query){
    $connect = getConnect();
    $stmt = $connect-> prepare($query);
    $stmt -> execute();
    $id = $connect -> lastInsertId();
    return $id;
};

 ?>
