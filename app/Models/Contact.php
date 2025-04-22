<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = 'id';
    protected $fillable = [
        'location',
        'address',
        'contact',
        'email'
    ];
}
