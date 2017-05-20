@extends('layouts.app')

@section('content')
<div class="container">

    <!-- FORMULÁRIO -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">

              <!-- cabeçalho painel do formulário -->
              <div class="panel-heading">Novo Administrador
                <a class="pull-right" href="{{ url('administradores') }}">Lista de Adminstradores</a>
              </div>

              <!-- corpo do painel com formulário -->
              <div class="panel-body">

                <!-- mensagem de feedback das operações -->
                @if(Session::has('mensagem_sucesso'))
                  <div class="alert alert-success">
                    {{ Session::get('mensagem_sucesso') }}
                  </div>
                @endif

                <!-- FORMULÁRIO -->
                @if(Request::is('*/editar'))
                  {!! Form::model($administrador, ['method'=>'PATCH', 'url'=>'administradores/'.$administrador->id]) !!}
                @else
                  {!! Form::open(['url' => 'administradores/salvar']) !!}
                @endif

                {!! Form::label('nome', 'Nome') !!}
                {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus']) !!}

                {!! Form::label('email', 'Email') !!}
                {!! Form::input('email', 'email', null, ['class'=>'form-control']) !!}

                {!! Form::label('login', 'Login') !!}
                {!! Form::input('text', 'login', null, ['class'=>'form-control']) !!}

                {!! Form::label('senha', 'Senha') !!}
                {!! Form::input('password', 'senha', null, ['class'=>'form-control']) !!}

                {!! Form::label('senha', 'Confirmar Senha') !!}
                {!! Form::input('password', 'senha', null, ['class'=>'form-control']) !!}
                <br/>
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{ url('administradores') }}">Cancelar</a>

                {!! Form::close() !!}
              </div>
          </div>
        </div>
    </div>
</div>

@endsection
