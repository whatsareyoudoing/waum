<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicationModel extends Model
{
    use HasFactory;

    protected $table = "application";
    public $timestamps = false;

    protected $primaryKey = "id_application";

    protected $fillable = [
        "name_application",
        "usercreate_application",
        "usercreate_update"
    ];


    public function menus(): HasMany
    {
        return $this->hasMany(MenuModel::class, 'id_application');
    }
}
