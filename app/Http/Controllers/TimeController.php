<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entities\Campeonato;
use App\Models\Entities\Jogo;
use App\Models\Entities\Organizacao;
use App\Models\Entities\Time;
use App\Models\Converters;


class TimeController extends Controller
{
   /**
     * Global private declarations.
     */
    private $campeonatos,$jogos,$organizacoes,$times;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(Time $times){
        $this->campeonatos = Converters::convert_object_to_array(Campeonato::all(),'id','nome');
        $this->jogos = Converters::convert_object_to_array(Jogo::all(),'id','nome');
        $this->organizacoes = Converters::convert_object_to_array(Organizacao::all(),'id','nome');
        $this->times = $times;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        //$times = $this->times->all();
        return view('test');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = $this->times->all();
        return view('index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campeonatos = $this->campeonatos;
        $jogos = $this->jogos;
        $organizacoes = $this->organizacoes;
        return view('form', compact('campeonatos','jogos','organizacoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Solicita que a model crie um novo registro com as informações do request -?-
        //e atribui o valor de cada atributo do request ao registro de referência
        $time = $this->times->create([
            'nome' => $request->nome,
            'jogo' => $request->jogo,
            'organizacao' => $request->organizacao,
        ]);
        $time->campeonatos = $request->campeonatos;
        //retorna a view index, onde as informações que a model time extrai do banco são exibidas
        return redirect()->route('time.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $time = $this->times->find($id);

        $campeonatos = $this->campeonatos;
        $jogos = $this->jogos;
        $organizacoes  = $this->organizacoes;
        return view('form', compact('campeonatos','jogos','organizacoes','time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time = $this->times->find($id);

        $campeonatos = $this->campeonatos;
        $jogos = $this->jogos;
        $organizacoes  = $this->organizacoes;
        return view('form', compact('campeonatos','jogos','organizacoes','time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $time = $this->times->find($id);
        $time->update($request->all());
        return redirect()->route('time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = $this->times->find($id);
        $deleted = $time->delete();
        return redirect()->route('time.index');
    }

}
