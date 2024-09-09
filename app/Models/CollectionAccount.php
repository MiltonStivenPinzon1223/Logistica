<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionAccount extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'price',
        'url',
        'status',
        'id_assitences',
    ];
    public function assistences()
    {
        return $this->belongsTo(CollectionAccount::class, 'id_assistences');
    }

}
