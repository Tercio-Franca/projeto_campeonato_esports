<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jogos';

    public function times(){
        return $this->hasMany(Time::class);
    }
}
