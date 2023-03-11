<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCategory extends Model
{
    use HasFactory;

    protected $table = 'vacancy_categories';
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
