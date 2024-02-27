<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicationModel extends Model
{
    use HasFactory;

    protected $table = "application";

    protected $primaryKey = "id_application";

    protected $fillable = [
        "kode_application",
        "nama_application",
        // Start - Default for all tables
        "m_createuser",
        "m_updateuser",
        "m_updateip",
        "m_updateact"
        // End - Default for all tables
    ];


    public function menus(): HasMany
    {
        return $this->hasMany(MenuModel::class, 'id_application');
    }
}
