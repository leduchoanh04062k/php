<?php
namespace Controllers;
use Models\Brand;
use Models\Car;
class HomeController extends BaseController{


	public function index(){
		$brands = Brand::all();
		include_once './views/home/index.php';
	}

	public function dashboard(){
        $totalBrand = Brand::count();
        $totalCar = Car::count();

	    $this->render('admin.dashboard', [
	        'brandCount' => $totalBrand,
            'carCount' => $totalCar
        ]);
    }
}


 ?>