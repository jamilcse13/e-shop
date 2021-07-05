<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';



    /**
     * @var array
     */
    protected $fillable = [
        'brand_id', 'sku', 'name', 'slug', 'description', 'quantity',
        'weight', 'price', 'sale_price', 'status', 'featured',
    ];



    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];


    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
}
