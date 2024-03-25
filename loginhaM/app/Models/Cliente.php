<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";

    protected $fillable = [
        "nome",
        "classe",
        "nivel",
        "pontos_vida",
        "pontos_energia",
    ];

    protected $casts = [
        'nivel' => 'integer',
        'pontos_vida' => 'integer',
        'pontos_energia' => 'integer',
    ];

    public function inventario()
    {
        return $this->hasMany(Inventario::class);
    }
}
