<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;

class JogoController extends Controller
{
   /**
     * Global private declarations.
     */
    private $jogos;


    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(Jogo $jogos){
        $this->jogos = $jogos;
    }


    public function show()
    {
        $jogos = $this->jogos->all();
        return view('welcome', compact('jogos'));
    }
}
