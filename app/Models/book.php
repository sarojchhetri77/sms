<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'class_id'
    ];
    public function grade(){
        return $this->belongsTo(grade::class);
    }
}
