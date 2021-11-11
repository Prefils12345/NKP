<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personne extends Model
{
    use HasFactory;
    protected $table = "t_personne";
    protected $primaryKey = "id_personne";
    protected $guarded = [];


    public function pays():BelongsTo{
        return $this->belongsTo(Pays::class,'id_pays','id_pays');
    }
    
    
}
