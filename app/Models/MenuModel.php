<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuModel extends Model
{
    use HasFactory;

    protected $table = "menu";

    protected $primaryKey = "id_menu";

    protected $fillable = [
        "id_application",
        "kode_menu",
        "nama_menu",
        "url_menu",
        "canother1label_menu",
        "canother2label_menu",
        "canother3label_menu",
        "canother4label_menu",
        "canother5label_menu",
        "canother6label_menu",
        "canother7label_menu",
        "canother8label_menu",
        "canother9label_menu",
        "canother10label_menu",
        // Start - Default for all tables
        "m_createuser",
        "m_updateuser",
        "m_updateip",
        "m_updateact"
        // End - Default for all tables
    ];

    public function applications(): BelongsTo
    {
        return $this->belongsTo(ApplicationModel::class, 'id_application');
    }


}
