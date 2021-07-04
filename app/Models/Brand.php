<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $table = 'brands';


    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'logo'
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


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
