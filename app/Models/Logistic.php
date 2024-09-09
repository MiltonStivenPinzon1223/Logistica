<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'runt',
        'celular',
        'description',
        'id_users',
    ];
    public function  users()
    {
        return $this->belongsTo(Logistic::class, 'id_users');
    }


}
