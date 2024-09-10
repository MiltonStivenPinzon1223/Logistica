<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistence extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hour',
        'status',
        'id_events',
        'id_logistics',
    ];
    public function events()
    {
        return $this->belongsTo(Event::class, 'id_events');
    }

    public function logistics()
    {
        return $this->belongsTo(Logistic::class, 'id_logistics');
    }

}
