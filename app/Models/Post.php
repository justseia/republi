<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    use Favoriteable;
    use Likeable;

    protected $table = 'posts';
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function additional_data()
    {
        return $this->hasMany(PostAdditionalData::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->with(['user', 'replies'])->orderBy('id', 'DESC')->whereNull('parent_id');
    }
}
