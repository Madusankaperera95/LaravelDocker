<?php

namespace App\Models;

use App\Models\Scopes\ActiveStatusScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['email','age','name','grade'];


    public static function booted()
    {
        static::addGlobalScope(new ActiveStatusScope);
    }

    public function scopePrimaryStudents($query)
    {
        return $query->where('age','<',10);
    }
}
