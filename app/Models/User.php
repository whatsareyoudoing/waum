<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "user";

    protected $primaryKey = "id_user";

    protected $fillable = [
        'id_role',
        'username_user',
        'password_user',
        // Start - Default for all tables
        'createuser_user',
        'updateuser_user',
        // End - Default for all tables
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_user',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password_user' => 'hashed',
    ];

    public function roles() {
        return $this->belongsToMany(RoleModel::class,'userrole', 'id_user', 'id_role');
    }
}
