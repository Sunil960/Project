<?php
namespace App;


use Illuminate\Database\Eloquent\Model;


class Product extends Model

{
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
       'product_name','description','front_cover_image','back_cover_image','shadow_cover_image','category_id'//,'quantity','price','sku','status'
    ];
}
