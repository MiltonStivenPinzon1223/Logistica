<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_type_certificates',
        'id_logistic',
    ];
    public function certificates()
    {
        return $this->belongsTo(TypeCertificate::class, 'id_type_certificates');
    }

    public function logistics()
    {
        return $this->belongsTo(Logistic::class, 'id_logistics');
    }

}
