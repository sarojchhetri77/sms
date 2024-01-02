<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'teacher_id',
        'section',
    ];
    public function student(){
    return $this->hasMany(student::class);
    }
    public function teacher(){
    return $this->belongsTo(teacher::class);
    }
    public function book(){
        return $this->hasMany(book::class);
    }
    public function enrollment(){
      return $this->hasMany(enrollment::class);
    }
    public function attendance(){
        return $this->hasMany(attendance::class);
    }
}
