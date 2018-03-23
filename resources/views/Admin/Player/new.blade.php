@extends('layouts.system')
@section('content')

<div class="container-fluid">
    <div class="row">
        @if(isset($errors)&& count($errors) > 0)
         <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                 <p>{{$error}}</p>
            @endforeach
         </div>
        @endif
        <form action="{{route('jogadores.store')}}" method="post" enctype="multipart/form-data" >
            {{ method_field('POST')}}
            {{ csrf_field() }}
            <div class="panel-body">
                <section class="hast">
                    <div class="col-md-11">
                        <h3 class="dark-grey"> Novo Jogador </h3><br>

                        <div class="form-group col-lg-6 has-feedback">
                            <label>Nome:</label>
                            <input type="text" name="name" class="form-control" id="nome" value="{{ old('name') }}" placeholder="Nome do Jogador" required="">
                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                        </div>
                        
                        <div class="form-group col-lg-3 has-feedback">
                            <label>Nº Camisa:</label>
                            <input type="text" name="number" class="form-control  {{ $errors->has('number') ? ' is-invalid' : '' }}" id="email" value="{{ old('number') }}" placeholder="Número da camisa" required="">
                        </div>
                        <div class="form-group col-lg-3 has-feedback">
                            <label>Possição</label>
                            <select id="position" name="position" onclick="combobox()" class="form-control" required="">
                                <option value="Goleiro">Goleiro</option>
                                <option value="Zagueiro">Zagueiro</option>
                                <option value="Laterais">Laterais</option>
                                <option value="Líbero">Líbero</option>
                                <option value="Volante">Volante</option>
                                <option value="Médio Ala">Médio Ala</option>
                                <option value="Médio Atacante">Médio Atacante</option>
                                <option value="Médio Centro">Médio Centro</option>
                                <option value="Meio-Campista">Meio-Campista</option>
                                <option value="Meia-Atacante">Meia-Atacante</option>
                                <option value="Ponta">Ponta</option>
                                <option value="Segundo Atacante">Segundo Atacante</option>
                                <option value="Centroavante">Centroavante</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-lg-12">
                                <label class="col-md-2 control-label" for="img">Foto do Jogador</label>
                                <input id="img" name="img" class="input-file" type="file">
                        </div>
                </section>
            </div>
            <div>
                <p class="text-left"><button type="submit" class="btn btn-success btn-success-custom "> Adicionar Jogador </button> <a href="{{route('jogadores.index')}}" type="button" class="btn btn-success btn-success-custom "> <i class="fa fa-arrow-left" aria-hidden="true"></i> voltar  </a></p>
            </div>
        </form>
    </div>
</div></br>

@endsection