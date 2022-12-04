<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'bid';
    public $timestamps = false;

    public function author(){
        return $this->belongsTo(Author::class);   
    }
}
