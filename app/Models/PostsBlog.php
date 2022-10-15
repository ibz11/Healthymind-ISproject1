<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PostsBlog extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'content',
        'role',
        'user_id',
        'user_name',
        'image',
        'URL1',
        'URL2',
    
       ];
       public function sluggable(): array
       {
           return [
               'slug' => [
                   'source' => 'title', 'id'
               ]
           ];
        }
}
