<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Administrador;
use Redirect;

class AdministradoresController extends Controller
{
  public function index()
  {
      $administradores_table = Administrador::get();

      $administradores = array();
      foreach($administradores_table as $administrador)
      {
          if($administrador->status != 'I')
            array_push($administradores, $administrador);
      }

      return view('administradores.lista', ['administradores' => $administradores]);
  }

  public function novo()
  {
      return view('administradores.formulario');
  }

  public function salvar(Request $request)
  {
    $administrador = new Administrador();
    $administrador = $administrador->create($request->all());

    \Session::flash('mensagem_sucesso', 'Administrador cadastrado com sucesso');

    return Redirect::to('administradores/novo');
  }

  public function editar($id)
  {
      $administrador = Administrador::findOrFail($id);

      return view('administradores.formulario', ['administrador' => $administrador]);
  }

  public function atualizar($id, Request $request)
  {
      $administrador = Administrador::findOrFail($id);
      $administrador->update($request->all());

      \Session::flash('mensagem_sucesso', 'Administrador atualizado com sucesso');

      return Redirect::to('administradores/'.$administrador->id.'/editar');
  }

  public function deletar($id, Request $request)
  {
      $administrador = Administrador::findOrFail($id);
      $administrador->delete();

      \Session::flash('mensagem_sucesso', 'Administrador deletado com sucesso');

      return Redirect::to('administradores');
  }

  public function excluir($id)
  {
      $administrador = Administrador::findOrFail($id);
      $administrador->status = 'I';
      $administrador->update();

      \Session::flash('mensagem_sucesso', 'Administrador deletado com sucesso');

      return Redirect::to('administradores');
  }

}
