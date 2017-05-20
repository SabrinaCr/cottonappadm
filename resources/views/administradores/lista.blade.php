@extends('layouts.app')

@section('content')
<div class="container">

    <!-- -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">

              <!-- cabeçalho do painel -->
              <div class="panel-heading">Adminstradores
                <a class="pull-right" href="{{url('administradores/novo')}}">Novo Administrador</a>
              </div>

              <!-- corpo do painel -->
              <div class="panel-body">

                <!-- mensagem de feedback das operações -->
                @if(Session::has('mensagem_sucesso'))
                  <div class="alert alert-success">
                    {{ Session::get('mensagem_sucesso') }}
                  </div>
                @endif

                <!-- Tabela de Dados -->
                  <table class="table">

                    <!-- cabeçalho tabela -->
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Ações</th>

                    <!-- corpo tabela -->
                    <tbody>
                      @foreach ($administradores as $administrador)
                        <tr>
                          <td>{{ $administrador->nome }}</td>
                          <td>{{ $administrador->login }}</td>
                          <td>{{ $administrador->email }}</td>
                          <td>
                            <a href="administradores/{{ $administrador->id }}/editar" class="btn btn-primary">Editar</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confimarExclusaoModal">Excluir</button>

                            <!-- MODAL para exclusão-->
                            <div id="confimarExclusaoModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- cabeçalho modal -->
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Confirmar Exclusão</h4>
                                  </div>

                                  <!-- corpo modal -->
                                  <div class="modal-body">
                                    @php
                                      $pos_espaco = strpos($administrador->nome, ' ');
                                      $adm = substr($administrador->nome, 0, $pos_espaco);
                                    @endphp
                                    <p>Confirma a exclusão do administrador {{ strtoupper($adm) }}?</p>
                                  </div>

                                  <!-- footer modal -->
                                  <div class="modal-footer">
                                    {!! Form::open(['url' => 'administradores/'.$administrador->id.'/excluir', 'style' => 'display: inline;'])!!}
                                    <button type="submit" class="btn btn-danger" id="delete">Excluir</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
              </div>
          </div>
    </div>
  </div>
</div>
@endsection
