<?php

namespace App;

class VendorInquiry extends BaseModel
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vendor_inquiry';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone_number',
        'city_id',
        'user_id',
        'vendor_id',
        'special_instruction',
        'event_date',
        'created_at',
        'updated_at'
    ];

    
    
}
