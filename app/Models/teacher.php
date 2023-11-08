<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'dob',
        'phone',
        'address',
        'gender',
        'hired_at'
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
