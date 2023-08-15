<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
     protected $fillable = ['filename', 'post_id'];

    // Define relationships
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
