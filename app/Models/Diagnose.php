<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\KnowledgeBase;

class Diagnose extends Model
{
    use HasFactory;
    protected $table = 'diagnose';
    protected $primaryKey = 'id_diagnosis';

    public function rule(): HasMany
    {
        return $this->hasMany(KnowledgeBase::class, 'kode_diagnosis');
    }
}
