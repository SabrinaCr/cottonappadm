<!-- FORMULÁRIO -->
<div class="row">
      <div class="col-md-8 col-md-offset-3">
          <div class="panel panel-default noborder">

              <!-- cabeçalho painel formulário -->
              <div class="panel-heading">
                @if(Request::is('*/editar'))
                  <h3>ALTERAR CULTIVAR</h3>
                  Alterar ciclo selecionado
                @else
                  <h2>NOVA CULTIVAR</h2>
                  <h4>Adicionar nova cultivar à base de dados</h4>
                @endif
              </div>

              <!-- corpo painel com formulário -->
              <div class="panel-body">

                <!-- mensagem de feedback de operação -->
                @if(Session::has('mensagem_sucesso'))
                  <div class="alert alert-success">
                    {{ Session::get('mensagem_sucesso') }}
                  </div>
                @endif

                <!-- FORMULÁRIO -->
                <!-- Conteúdo Lista Selects -->
                @php
                  $alturas = ['Alta'=>'Alta', 'Media'=>'Média', 'Baixa'=>'Baixa', 'BaixaMedia'=>'Baixa/Média', 'MediaAlta'=>'Média/Alta'];
                  $fertilidades = ['Alta'=>'Alta', 'Media'=>'Média', 'Baixa'=>'Baixa', 'BaixaMedia'=>'Baixa/Média', 'MediaAlta'=>'Média/Alta'];
                  $reguladores = ['Alta'=>'Alta', 'Media'=>'Média', 'Baixa'=>'Baixa', 'BaixaMedia'=>'Baixa/Média', 'MediaAlta'=>'Média/Alta'];
                @endphp

                <!-- abrir formulário -->
                @if(Request::is('*/editar'))
                  {!! Form::model($cultivar, ['method'=>'PATCH', 'url'=>'cultivares/'.$cultivar->id]) !!}
                @else
                  {!! Form::open(['url' => 'cultivares/salvar']) !!}
                @endif

                <!-- inputs -->
                <!-- Primeira linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('nome', 'Nome') !!}<br />
                    {!! Form::input('text', 'nome', null, ['style' => 'width: 500px; margin-right: 20px;', 'class'=>'form-control', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('ciclo', 'Ciclo') !!}<br />
                    {{ Form::select('selectCiclo', $ciclos, null, array('style' => 'width: 300px;', 'class' => 'form-control')) }}
                  </div>
                </div>
                <br />

                <!-- Segunda linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('altura', 'Altura da Planta') !!}<br />
                    {{ Form::select('selectAltura', $alturas, null, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {!! Form::label('fertilidade', 'Exigência em Fertilidade') !!}<br />
                    {{ Form::select('selectFertilidade', $fertilidades, null, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                  </div>

                  <div class="form-group">
                    {!! Form::label('regulador', 'Exigência em Regulador') !!}<br />
                    {{ Form::select('selectRegulador', $reguladores, null, array('style' => 'width: 260px; margin-right: 20px;', 'class' => 'form-control')) }}
                  </div>
                </div>
                <br />

                <!-- Terceira linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('rendimentoFibra', 'Rendimento da Fibra (%)') !!}<br />
                    {!! Form::input('text', 'rendimentoFibra', null, ['placeholder'=>'0,00', 'style' => 'width: 300px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('comprimentoFibra', 'Comprimento da Fibra (mm)') !!}<br />
                    {!! Form::input('text', 'comprimentoFibra', null, ['placeholder'=>'0,00', 'style' => 'width: 300px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>
                </div>
                <br />

                <!-- Quarta linha do Formulário -->
                <div class="form-inline">
                  <div class="form-group">
                    {!! Form::label('pesoMedioCapulho', 'Peso Médio do Capulho (g)') !!}<br />
                    {!! Form::input('text', 'pesoMedioCapulho', null, ['placeholder'=>'0,00', 'style' => 'width: 260px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('micronaire', 'Micronaire') !!}<br />
                    {!! Form::input('text', 'micronaire', null, ['placeholder'=>'0,00', 'style' => 'width: 260px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('resistencia', 'Resistência') !!}<br />
                    {!! Form::input('text', 'resistencia', null, ['placeholder'=>'0,00', 'style' => 'width: 260px; margin-right: 20px;', 'class'=>'form-control myNumber', 'required']) !!}
                  </div>
                </div>
                <br />

                <div lass="form-inline">
                  <a class="btn btn-success" href="#doencasTolerancias">Vincular Doenças</a>
                  <!-- submits -->
                  @if(Request::is('*/editar'))
                    {!! Form::submit('Alterar', ['class'=>'btn btn-primary', 'style'=>'display:inline;']) !!}
                  @else
                    {!! Form::submit('Salvar', ['class'=>'btn btn-success', 'style'=>'display:inline;']) !!}
                  @endif
                  {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                  <!-- Fechar Formulário -->
                  {!! Form::close() !!}
                </div>
            </div>

              <!-- FOOTER -->
              <div class="panel-footer">
              </div>
          </div>
        </div>
</div>
<div id="doencasTolerancias">
  @include('cultivares.listaDoencas')
</div>
