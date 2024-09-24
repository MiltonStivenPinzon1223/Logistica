<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date',
        'address',
        'start',
        'end',
        'quotas',
        'description',
        'id_type_clothing',
        'id_users',
    ];
    public function type_clothing()
    {
        return $this->belongsTo(TypeClothing::class, 'id_type_clothing');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }    

}
