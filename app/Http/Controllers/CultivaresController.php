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
        $cultivar = new Cultivar();
        $cultivarNova = new Cultivar();

        $rendimentoFibra = $this->getValor($request->input('rendimentoFibra'));
        $pesoCapulho = $this->getValor($request->input('pesoMedioCapulho'));
        $comprimentoFibra = $this->getValor($request->input('comprimentoFibra'));
        $micronaire = $this->getValor($request->input('micronaire'));
        $resistencia = $this->getValor($request->input('resistencia'));

        $query = [
          'nome' => $request->input('nome'),
          'altura_planta' => $request->get('selectAltura'),
          'fertilidade' => $request->get('selectFertilidade'),
          'regulador' => $request->get('selectRegulador'),
          'rendimento_fibra' => $rendimentoFibra,
          'peso_capulho' => $pesoCapulho,
          'comprimento_fibra' => $comprimentoFibra,
          'micronaire' => $micronaire,
          'resistencia' => $resistencia,
          'cic_id' => intval($request->input('selectCiclo'))
      ];

        $cultivar= $cultivar->create($query);
        \Session::flash('mensagem_sucesso', 'Cultivar cadastrada com sucesso.');

        if($request->is('cultivares/salvar'))
          return Redirect::to('cultivares');
        else
          return Redirect::to('cultivares/lista');
    }

    public function nova()
    {
        return view('cultivares.nova');
    }

    public function getValor($entrada)
    {
        // se a entrada veio sem vírgula
        if(strlen($entrada) < 4)
          $entrada .= ",00";

        $entrada = str_replace(",",".", $entrada);
        $valor = (double)$entrada;

        return $valor;
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

    // public function arrayTolerancias()
    // {
    //     $tolerancias_table = Tolerancia::get();
    //     $tolerancias = array();
    //
    //     foreach($tolerancias_table as $tolerancia)
    //     {
    //       if($tolerancia->status != 'I')
    //           array_push($tolerancias, $tolerancia);
    //     }
    //
    //     return $tolerancias;
    // }
}
