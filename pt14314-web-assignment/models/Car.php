<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Car extends Model{
    public $timestamps = false;
    protected $table = 'cars';
    protected $fillable = [ 'brand_id', 'model_name', 'price', 'sale_price', 'detail', 'quantity'];
    protected $attributes = [
        'image' => "public/images/default-image.jpg",
    ];
    public function getCategoryName(){
    	$brands = Brand::find($this->brand_id);
    	if($brands){
    		return $brands->brand_name;
    	}
    	return null;
    }
}


?>