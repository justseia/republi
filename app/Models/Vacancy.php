<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Vacancy extends Model
{
    use HasFactory, SoftDeletes;
    use Favoriteable;

    protected $table = 'vacancies';
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'location_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
