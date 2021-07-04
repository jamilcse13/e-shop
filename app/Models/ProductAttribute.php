<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_attributes';



    /**
     * @var array
     */
    protected $fillable = ['product_id', 'quantity', 'price'];


    /**
     * Undocumented function
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class);
    }
}
