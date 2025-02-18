<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Permet de créer des données factices pour du test
    use HasFactory;

    //Nom de la table associé
    protected $table = 'users';

    // Colonnes modifiables
    protected $fillable = [
        'name', 
        'email', 
        'password'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
