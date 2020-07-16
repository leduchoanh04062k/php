<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;
class Brand extends Model{
	public $timestamps = false;
    protected $table = 'brands';
    protected $fillable = ['brand_name', 'logo ', 'country'];
     protected $attributes = [
        'logo' => "public/images/default-image.jpg",
    ];

}


?>