<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;    
        protected $fillable = [
        'title',
        'description',
        'content',
        'user_id',
        'slug',
        'img_src'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function comments () {
        return $this->morphMany(Comment::class , 'commentable');
    }

        public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function deleteImage() {
        $result = 'public/'.$this->img_src;
        Storage::delete($result);
    }
}
