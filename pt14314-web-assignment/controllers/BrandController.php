<?php 
namespace Controllers;
use Models\Car;
use Models\Brand;
class BrandController extends BaseController{
    public function index(){
        // 1. Lấy toàn bộ sản phẩm
        $brands = Brand::all();
        $this->render('brand.index', [
            'brands' => $brands
        ]);
    }
    public function remove($id){
       $brand = Brand::find($id);
        if($brand == null){
            header("location: " . BASE_URL ."brands?msg=id không tồn tại");
            die;
        }

        // 2. thực hiện xóa
        Brand::destroy($id);
            header("location: " . BASE_URL ."brands?msg=Xóa thông tin thành công!");
            die;
        }

     public function addForm(){
        $cates = Brand::all();
        $this->render('brand.add',[
            'cates' =>$cates]);
    }

    public function editForm($id){
        $cates = Brand::all();
        // lấy ra dữ liệu của sản phẩm theo id
        $brand = Brand::find($id);
        if(!$brand){
            header("location: " . BASE_URL . "brands?msg=id không tồn tại");
            die;
        }
          $this->render('brand.edit', [
              'cates' => $cates,
            'brand' => $brand
        ]);
        
    }

   public function saveAdd(){
        $model = new Brand();
        // gán dữ liệu cho model
        $model->fill($_POST);
        // validate dữ liệu thêm 1 lần nữa bằng php => form
        // lưu file ảnh
        $logo = $_FILES['logo'];
        $filename = "";
        if($logo['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $logo['name'];
            move_uploaded_file($logo['tmp_name'], $filename);
        }
        $model->logo = $filename;
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL . 'brands');
        die;
    }

    public function saveEdit(){
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Brand::find($id);
        if(!$model){
            header("location: " . BASE_URL . "brands?msg=id không tồn tại");
            die;
        }

        // gán dữ liệu cho model
        $model->fill($_POST);
        // validate dữ liệu thêm 1 lần nữa bằng php => form
        // lưu file ảnh
        $logo = $_FILES['logo'];
        $filename = $model->logo;
        if($logo['size'] > 0){
            $filename = "public/images/" . uniqid() . '-' . $logo['name'];
            move_uploaded_file($logo['tmp_name'], $filename);
        }
        $model->logo = $filename;
        // lưu dữ liệu với csdl
        $model->save();
        header('location: ' . BASE_URL.'brands');
        die;
    }

    public function checkNameExisted(){
        $brand_name = $_POST['brand_name'];
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
       $queryData = Brand::where('brand_name', $brand_name);

        if($id != -1){
            $queryData->where('id', '!=', $id);
        }
        $numberRecord = $queryData->count();

        echo $numberRecord == 0 ? "true" : "false";
    }

   }

 ?>