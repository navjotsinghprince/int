<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['user_id', 'category_id', 'title', 'content', 'slug', 'status', 'published_at'];
}
