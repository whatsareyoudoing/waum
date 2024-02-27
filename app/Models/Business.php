<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Business extends Model
{
    use HasFactory;

    protected $table = "business";

    protected $primaryKey = "id_business";

    protected $fillable = [
        "nama_business",
        // Start - Default for all tables
        "m_createuser",
        "m_updateuser",
        "m_updateip",
        "m_updateact"
        // End - Default for all tables
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    
}
