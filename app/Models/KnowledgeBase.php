<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Symptom;
use App\Models\Diagnose;


class KnowledgeBase extends Model
{
    use HasFactory;
    protected $table = 'knowledge_base';
    protected $primaryKey = 'id_basis_pengetahuan';

    public function gejala(): HasMany
    {
        return $this->hasMany(Symptom::class, 'kode_gejala');
    }

    public function penyakit(): HasMany
    {
        return $this->hasMany(Diagnose::class, 'kode_diagnosis');
    }
}
