<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    protected $table = "company";

    protected $primaryKey = "id_company";

    protected $fillable = [
        "id_business",
        "kode_company",
        "currency_company",
        "nama_company",
        "alamat_company",
        "telp_company",
        "email_company",
        // Start - Default for all tables
        "m_createuser",
        "m_updateuser",
        "m_updateip",
        "m_updateact"
        // End - Default for all tables
    ];

    public function businesses(): HasOne
    {
        return $this->hasOne(Business::class,'id_business','id_business');
    }

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class, 'id_company');
    }
}
