<?php
define('BASE_URL', 'http://localhost/pt14314-web-assignment/');
define('ADMIN_ASSET_URL', BASE_URL . 'public/admin/');
define('DEFAULT_IMAGE',  BASE_URL . 'public/images/default-image.jpg');


function dd($val){
    echo "<pre>";
    var_dump($val);die;
}