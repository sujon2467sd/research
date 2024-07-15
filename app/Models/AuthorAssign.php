<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorAssign extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    // Define the relationship with the Publication model
    public function publication()
    {
        return $this->belongsTo(Blog::class, 'publication_id');
    }
}
