<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'class_id'
    ];
    public function grade(){
        return $this->belongsTo(grade::class ,'class_id');
    }
    public function student(){
        return $this->belongsTo(student::class ,'student_id');
    }
}
