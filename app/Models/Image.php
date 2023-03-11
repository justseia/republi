<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $guarded = [];
    protected $hidden = [
        'imageable_id',
        'imageable_type',
        'created_at',
        'updated_at'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
