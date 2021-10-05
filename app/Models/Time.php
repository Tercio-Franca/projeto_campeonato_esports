<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'times';

    public function jogo(){
        return $this->belongsTo(Jogo::class);
    }

    public function organizacao(){
        return $this->belongsTo(Organizacao::class);
    }

    public function campeonatos(){
        return $this->belongsToMany(Campeonato::class);
    }
}
