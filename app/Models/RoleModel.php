<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;  

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'id_company',
        'nama_role',
        // Start - Default for all tables
        'm_createuser',
        'm_updateuser',
        'm_updateip',
        'm_updateact',
        // End - Default for all tables

    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'userrole', 'id_role', 'id_user');
    }
  
    public function menurole(): HasOne
    {
        return $this->hasOne(MenuRoleModel::class,'id_role','id_role');
    }
}
