<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizacao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organizacoes';

    public function times(){
        return $this->hasMany(Time::class);
    }
}
