<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class,'author_id');
    }
    
    public function publication()
    {
        return $this->belongsTo(Blog::class,'publication_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
