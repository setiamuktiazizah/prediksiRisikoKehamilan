<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class ActivityLog extends Model
{
    use HasFactory;
    protected $table = 'activity_log';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'activity',
    ];

    // Relasi dengan model User

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
