<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'teacher_id'
    ];
}
