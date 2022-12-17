<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointement extends Model
{
    use HasFactory;

    protected $table = "Appointements";
    protected $fillable = [
        'dateRdv',
        'objet',
        'description',
        'statut'=>"En Attente",
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'patient_id', 'id');
    }
}
