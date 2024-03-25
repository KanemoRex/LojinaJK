<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artefato extends Model
{
    use HasFactory;

    protected $table = "artefatos";

    protected $fillable = [
        "nome",
        "raridade",
        "sintonizacao",
        "tipo",
    ];

    protected $casts = [
        'categoria_id' => 'integer'
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo');
    }
}
