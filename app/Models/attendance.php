<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'teacher_id',
        'class_id',
        'date',
        'status'
    ];
    public function student(){
        return $this->belongsTo(student::class,'student_id');
    }
    public function grade(){
        return $this->belongsTo(grade::class,'class_id');
    }
    public function teacher(){
        return $this->belongsTo(teacher::class,'teacher_id');
    }

}
