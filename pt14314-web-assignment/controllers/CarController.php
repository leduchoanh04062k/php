<?php 
namespace Controllers;
use Models\Car;
use Models\Brand;
class CarController extends BaseController{
 public function index(){
        // 1. Lấy toàn bộ sản phẩm
        $cars = Car::all();
        $this->render('car.index', [
            'cars' => $cars
        ]);
    }
 public function remove($id){
       $car = Car::find($id);
        if($car == null){
            header("location: " . BASE_URL ."cars?msg=id không tồn tại");
            die;
        }

        // 2. thực hiện xóa
        Car::destroy($id);
            header("location: " . BASE_URL ."cars?msg=Xóa thông tin thành công!");
            die;
        }
   public function addForm(){
        $brands = Brand::all();
        $this->render('car.add',[
            'brands' =>$brands]);
    } 
    public function saveAdd(){
        $model = new Car();
        // gán dữ liệu cho model
        $model->fill($_POST);
        // validate dữ liệu thêm 1 lần nữa bằng php => form
        // lưu file ảnh
        $image = $_FILES['image'];
        $filename = "";
        if($image['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $image['name'];
            move_uploaded_file($image['tmp_name'], $filename);
        }
        $model->image = $filename;
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL .'cars');
        die;
    } 
     public function checkNameExisted(){
        $model_name = $_POST['model_name'];
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
       $queryData = Car::where('model_name', $model_name);

        if($id != -1){
            $queryData->where('id', '!=', $id);
        }
        $numberRecord = $queryData->count();

        echo $numberRecord == 0 ? "true" : "false";
    }
     public function editForm($id){
        $brands = Brand::all();
        // lấy ra dữ liệu của sản phẩm theo id
        $car = Car::find($id);
        if(!$car){
            header("location: " . BASE_URL . "cars?msg=id không tồn tại");
            die;
        }
          $this->render('car.edit', [
              'brands' => $brands,
              'car'  =>$car
            
        ]);
        
    }
     public function saveEdit(){
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Car::find($id);
        if(!$model){
            header("location: " . BASE_URL . "cars?msg=id không tồn tại");
            die;
        }

        // gán dữ liệu cho model
        $model->fill($_POST);
        // validate dữ liệu thêm 1 lần nữa bằng php => form
        // lưu file ảnh
        $image = $_FILES['image'];
        $filename = $model->image;
        if($image['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $image['name'];
            move_uploaded_file($image['tmp_name'], $filename);
        }
        $model->image = $filename;
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL.'cars');
        die;
    }    
}

 ?>