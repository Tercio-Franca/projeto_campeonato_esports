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
     * Get the Campeonatos attribute.
     *
     * @return string
     */
    public function getCampeonatosAttribute() {
        return $this->campeonatosRelationship;
    }

    /**
     * Set the CampeonatosAttribute.
     *
     * @param  array  $value
     * @return void
     */
    public function setCampeonatosAttribute($value) {
        $this->campeonatosRelationship()->sync($value);
    }

    /**
     * Get the jogo's attribute.
     *
     * @return string
     */
    public function getJogoAttribute() {
        return $this->jogoRelationship->nome;
    }

    /**
     * Set the jogo's id.
     *
     * @param  int  $value
     * @return void
     */
    public function setJogoAttribute($value)
    {
        if(isset($value)){
            $this->attributes['jogo_id'] = Jogo::where('id', $value)->first()->id;
        }
    }

    /**
     * Get the organização's attribute.
     *
     * @return string
     */
    public function getOrganizacaoAttribute() {
        return $this->organizacaoRelationship->nome;
    }

    /**
     * Set the organização's id.
     *
     * @param  int  $value
     * @return void
     */
    public function setOrganizacaoAttribute($value)
    {
        if(isset($value)){
            $this->attributes['organizacao_id'] = Organizacao::where('id', $value)->first()->id;
        }
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
