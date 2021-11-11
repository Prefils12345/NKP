<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Identification extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the etatcivil that owns the Identification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function etatcivil(): BelongsTo
    {
        return $this->belongsTo(EtatCivil::class, 'etat_civils_id', 'id');
    }

    /**
     * Get the departement that owns the Identification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class, 'departements_id', 'id');
    }

    
}
