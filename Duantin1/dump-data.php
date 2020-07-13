<?php 
require_once './commons/db.php';
//https://github.com/fzaninotto/Faker
require_once './libs/Faker/autoload.php';
$faker = Faker\Factory::create();

// insert dữ liệu mẫu cho bảng products (100 bản ghi)
function productTable(){
	global $faker;

	for ($i=0; $i < 100; $i++) { 
		$name = $faker->name;
		$sku = strtoupper(uniqid());
		$cate_id = rand(1, 20);
		$disabled_comment = rand(0, 1);
		$price = rand(1000, 999999999);
		$sale_price = rand(1000, 999999999);
		$detail = $faker->realText($maxNbChars = 200, $indexSize = 2);
		$detail = str_replace("'","\'", $detail);
		$feature_image = $faker->image('public/images', 640, 480, 'cats');
		$feature_image = str_replace("public", "", $feature_image);
		$view_count = rand(0, 999999);
		$status = 1;
		$rating = rand(1, 5);

		$sqlQuery = "insert into products 
						(name, 
						sku, 
						cate_id, 

						disabled_comment, 
						price, 
						sale_price,
						
						detail,
						feature_image,
						view_count,

						status,
						rating)
				values ('$name', 
						'$sku', 
						'$cate_id', 

						'$disabled_comment', 
						'$price', 
						'$sale_price',
						
						'$detail',
						'$feature_image',
						'$view_count',

						'$status',
						'$rating')";
		//executeQuery($sqlQuery);
	}
}
// thêm dữ liệu vào bảng product_galleries
function productGalleryTable(){
	global $faker;
	// lấy toàn bộ data trong bảng products
	$sqlQuery = "select * from products";
	$products = executeQuery($sqlQuery, true);
	// vòng lặp để thêm các ảnh vào bảng product_galleries
	foreach ($products as $item) {
		$imgAmount = rand(2, 4);
		for ($i=0; $i < $imgAmount; $i++) { 
			$product_id = $item['id'];
			$url = $faker->image('public/images', 640, 480, 'people');
			$url = str_replace("public/", "", $url);
			$sqlProGallery = "insert into product_galleries
								(product_id, url)
							values
								('$product_id', '$url')";
								var_dump($sqlProGallery);
			//executeQuery($sqlProGallery);
		}
	}

}

// demo faker
/*var_dump($faker->imageUrl($width = 640, $height = 480));
var_dump($faker->image('public/images', 640, 480, 'cats'));
die;
$companyName = $faker->company;
echo $name. "-" . $companyName;
die;
*/

// tạo dump data cho bảng roles
/*$roles = [
	['name' => 'member', 'status' => 1],
	['name' => 'admin', 'status' => 1],
	['name' => 'super admin', 'status' => 1]
];
foreach ($roles as $value) {
	extract($value);
	$sqlQuery = "insert into roles (name, status)
				values ('$name', $status)";
	// executeQuery($sqlQuery);
}*/

// tạo dữ liệu cho bảng users
/*$users = [
	[
		'name' => 'Trần Thị Yên',
		'email' => 'yentt@gmail.com',
		'password' => password_hash('123456', PASSWORD_DEFAULT),
		'role_id'=> 1
	],
	[
		'name' => 'Trần Hồng Phước',
		'email' => 'phuocth@gmail.com',
		'password' => password_hash('123456', PASSWORD_DEFAULT),
		'role_id'=> 2
	],
	[
		'name' => 'admin',
		'email' => 'admin@gmail.com',
		'password' => password_hash('123456', PASSWORD_DEFAULT),
		'role_id'=> 2
	]
];
foreach ($users as $value) {
	extract($value);
	$sqlQuery = "insert into users (name, email, password, role_id)
			values ('$name', '$email', '$password', $role_id)";
	// executeQuery($sqlQuery);
}*/


// tạo dữ liệu cho bảng categories
/*for ($i=0; $i < 10; $i++) { 
	$name = $faker->name;
	$desc = $faker->realText($maxNbChars = 200, $indexSize = 2);
	//biến đổi dữ liệu / chuẩn hóa dữ liệu cho chức năng
	$desc = str_replace("'","\'", $desc);
	$showMenu = rand(0, 1);
	$sqlQuery = "insert into categories
					(name, description, show_menu)
				values
					('$name', '$desc', $showMenu)";
	// echo "<pre>";
	// var_dump($sqlQuery);
	// executeQuery($sqlQuery);

}*/






 ?>
