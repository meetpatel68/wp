<?php

namespace App;

class ContactUs extends BaseModel
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'contact_us';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'message',
        'created_at',
        'updated_at'
    ];

    
    
}
