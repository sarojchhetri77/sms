<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'subject_id',
        'exam_id',
        'marks'
    ];
    public function exam(){
       return  $this->belongsTo(exam::class);
    }
    public function books(){
       return  $this->belongsTo(book::class,'subject_id');
    }
}
