<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\KnowledgeBase;

class Symptom extends Model
{
    use HasFactory;
    protected $table = 'symptom';
    protected $primaryKey = 'id_gejala';

    public function rule(): HasMany
    {
        return $this->hasMany(KnowledgeBase::class, 'kode_gejala');
    }
}
