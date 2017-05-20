<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cultivar;
use App\Doenca;
use App\Tolerancia;
use App\Ciclo;
use Redirect;
use DB;

class CultivaresController extends Controller
{
    public function index()
    {
        $ciclos = Ciclo::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
        $tolerancias = Tolerancia::where('status', '')->orderBy('descricao')->lists('descricao', 'id');
        $doencas = $this->arrayDoencas();

        return view('cultivares.nova', ['doencas'=> $doencas, 'tolerancias'=>$tolerancias, 'ciclos'=>$ciclos]); // substituir formulário por principal
    }

    public function salvar(Request $request)
    {
        $tolerancia = new Cultivar();
        $tolerancia = $tolerancia->create($request->all());

        \Session::flash('mensagem_sucesso', 'Tolerância cadastrada com sucesso.');

        if($request->is('tolerancias/salvar'))
          return Redirect::to('tolerancias');
        else
          return Redirect::to('tolerancias/lista/nova');
    }

    public function arrayCultivares()
    {
        $cultivares_table = Cultivar::get();
        $cultivares = array();

        foreach($cultivares_table as $cultivar)
        {
          if($cultivar->status != 'I')
              array_push($cultivares, $cultivar);
        }

        return $cultivares;
    }

    public function arrayDoencas()
    {
        $doencas_table = Doenca::get();
        $doencas = array();

        foreach($doencas_table as $doenca)
        {
          if($doenca->status != 'I')
              array_push($doencas, $doenca);
        }

        return $doencas;
    }

    public function arrayTolerancias()
    {
        $tolerancias_table = Tolerancia::get();
        $tolerancias = array();

        foreach($tolerancias_table as $tolerancia)
        {
          if($tolerancia->status != 'I')
              array_push($tolerancias, $tolerancia);
        }

        return $tolerancias;
    }
}
