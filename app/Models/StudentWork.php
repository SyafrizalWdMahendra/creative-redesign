<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentWork extends Model
{
    protected $guarded = 'id';
    protected $fillable = [
        'name',
        'image',
        'description',
    ];
}
