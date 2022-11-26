<?php

namespace App\Models;

use App\Models\User;
use App\Models\Leçon;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cour extends Model
{
    use HasFactory;
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'courses';

    protected $fillable = [
        'id',
        'title',
        'description',
        "image",
        "updated_at",
        "created_at",
    ];

    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }
    public function leçons(){
        return $this->hasMany(Leçon::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
