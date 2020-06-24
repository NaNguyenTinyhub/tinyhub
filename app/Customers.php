<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = "customer";

    // Declare primary key on table
    protected $primaryKey = "id";

    // Set default primary key auto increment
    public $incrementing = false;

    protected $fillable = ['id', 'customer_name', 'dob', 'gender', 'phone', 'address', 'feature', 'users_id', 
    'created_at', 'updated_at'];
}
