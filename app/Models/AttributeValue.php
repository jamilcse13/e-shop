<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    /**
     * @var string
     */
    protected $table = 'attribute_values';



    /**
     * @var array
     */
    protected $fillable = [
        'attribute_id', 'value', 'price'
    ];



    /**
     * @var array
     */
    protected $casts = [
        'attribute_id'  =>  'integer',
    ];


    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
