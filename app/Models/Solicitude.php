<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'status',
        'id_users',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
