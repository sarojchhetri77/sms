<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'status',
        
    ];
    public function result(){
        $this->hasMany(result::class);
    }
}
