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

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'jogo_id',
        'organizacao_id',
        //'pivot',
        'organizacaoRelationship',
        'jogoRelationship',
        'campeonatosRelationship',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'campeonatos',
        'jogo',
        'organizacao',
    ];

    /**
     * Get the Jogo attribute.
     *
     * @return string
     */
    public function getCampeonatosAttribute() {
        return $this->campeonatosRelationship;
    }

    /**
     * Get the Jogo attribute.
     *
     * @return string
     */
    public function getJogoAttribute() {
        return $this->jogoRelationship->nome;
    }

    /**
     * Get the Organizacao attribute.
     *
     * @return string
     */
    public function getOrganizacaoAttribute() {
        return $this->organizacaoRelationship->nome;
    }


    public function jogoRelationship(){
        return $this->belongsTo(Jogo::class,'jogo_id');
    }

    public function organizacaoRelationship(){
        return $this->belongsTo(Organizacao::class,'organizacao_id');
    }

    public function campeonatosRelationship(){
        return $this->belongsToMany(Campeonato::class, 'campeonato_has_time', 'time_id', 'campeonato_id');
    }
}
