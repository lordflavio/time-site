@extends('layouts.system')

@section('content')

<div class="container-fluid">
    <div class="row">
        <form action="{{route('jogos.update',$game->id)}}" method="post">
                {{ method_field('PUT')}}
                {{ csrf_field() }}
                <div class="panel-body">
                    <section class="col-md-offset-2">
                        <div class="col-md-12">
                            <h3 class="dark-grey">Modificar partida</h3><br>

                            <div class="form-group col-lg-5 has-feedback">
                                <label>Data: {{$game->date}} </label>
                                <input type="date" name="date" class="form-control" id="nome" value="{{ old('date') }}" placeholder="">
                                <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-4 has-feedback">
                                <label>Hora:</label>
                                <input type="time" name="time" class="form-control" id="nome" value="{{ $game->time }}" placeholder="" required="">
                                <span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-9 has-feedback">
                                <label>Endereço:</label>
                                <input type="text" name="address" class="form-control" id="nome" value="{{ $game->address }}" placeholder="Ex: Clube Cornelio Vilela" required="">
                                <span class="fa fa-thumb-tack form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-9 has-feedback ">
                                <label >Descrição:</label>
                                <textarea  name="description" class="form-control" style="height: 100px"  id="descIns" placeholder="Descrição...">{{$game->description}}</textarea>
                                {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                            </div>

                            <div class="form-group col-lg-4 has-feedback">
                                <img class="center-block" src="{{$clube[0]->shild}}" width="50">
                                <label>{{$clube[0]->name}}: Gols </label>
                                <input type="text" name="golsClub1" class="form-control" id="nome" value="{{ $clube[0]['pivot']->gols }}" placeholder="" required="">

                            </div>

                            <div class="col-md-1">VS</div>

                            <div class="form-group col-lg-4 has-feedback">
                                <img class="center-block" src="{{$clube[1]->shild}}" width="50">
                                <label>{{$clube[1]->name}}: Gols </label>
                                <input type="text" name="golsClub2" class="form-control" id="nome" value="{{ $clube[1]['pivot']->gols }}" placeholder="" required="">
                            </div>
                            
                    </section>
                </div>
                <div class="col-md-11">
                    <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Salva </button> <a href="{{route('jogos.index')}}" type="button" class="btn btn-success btn-success-custom "> <i class="fa fa-arrow-left" aria-hidden="true"></i> voltar  </a> </p>
                </div>
        </form>

    </div>
</div>
    
@endsection