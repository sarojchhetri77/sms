<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'dob',
        'phone',
        'address',
        'gender'
    ];
     public function user(){
        return $this->belongsTo(User::class);
     }
     public function grade(){
        return $this->belongsTo(grade::class);
     }
     public function enrollments(){
      return $this->hasMany(enrollment::class);
     }
     public function attendance(){
      return $this->hasMany(attendance::class,'student_id');
     }
     


}
