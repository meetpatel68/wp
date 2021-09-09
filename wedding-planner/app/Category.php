<?php

namespace App;

class Category extends BaseModel
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'category';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'icon',
        'description',
        'status',
        'order',
        'created_at',
        'updated_at',
    ];

    
    
}
