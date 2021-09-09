<?php

namespace App;

class City extends BaseModel
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'city';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_name',
        'status',
        'created_at',
        'updated_at',
    ];

    
    
}
