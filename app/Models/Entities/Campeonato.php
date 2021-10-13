<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campeonatos';

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
        'pivot',
        'created_at',
        'updated_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];


    public function timesRelationship(){
        return $this->belongsToMany(Time::class);
    }
}
