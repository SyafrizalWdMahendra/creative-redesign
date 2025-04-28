<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $guarded = 'id';
    protected $fillable = [
        'name',
        'title',
        'content',
        'image',
    ];

    public function historyContents()
    {
        return $this->hasMany(HistoryContent::class);
    }
}
