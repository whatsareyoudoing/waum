<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuRoleModel extends Model
{
    use HasFactory;

    protected $table = "menurole";

    protected $primaryKey = "id_menu";

    protected $fillable = [
        "id_role",
        "id_menu",
        "canread",
        "caninsert",
        "canupdate",
        "candelete",
        "canother1",
        "canother2",
        "canother3",
        "canother4",
        "canother5",
        "canother6",
        "canother7",
        "canother8",
        "canother9",
        "canother10",
        // Start - Default for all tables
        "m_createuser",
        "m_updateuser",
        "m_updateip",
        "m_updateact"
        // End - Default for all tables
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(RoleModel::class, 'id_role');
    }

}
