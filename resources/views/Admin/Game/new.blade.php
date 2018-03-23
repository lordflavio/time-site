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
        <!--Games-->
        <section id="games">
            <form action="{{route('jogos.store')}}" method="post">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <div class="panel-body">
                    <section class="col-md-offset-2">
                        <div class="col-md-12">
                            <h3 class="dark-grey">Registra nova partida</h3><br>

                            <div class="form-group col-lg-5 has-feedback">
                                <label>Data:</label>
                                <input type="date" name="date" class="form-control" id="nome" value="{{ old('date') }}" placeholder="" required="">
                                <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-4 has-feedback">
                                <label>Hora:</label>
                                <input type="time" name="time" class="form-control" id="nome" value="{{ old('time') }}" placeholder="" required="">
                                <span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-9 has-feedback">
                                <label>Endereço:</label>
                                <input type="text" name="address" class="form-control" id="nome" value="{{ old('address') }}" placeholder="Ex: Clube Cornelio Vilela" required="">
                                <span class="fa fa-thumb-tack form-control-feedback form-control-feedback-custom"></span>
                            </div>

                            <div class="form-group col-lg-9 has-feedback ">
                                <label >Descrição:</label>
                                <textarea  name="description" class="form-control" style="height: 100px"  id="descIns" placeholder="Descrição...">{{old('description')}}</textarea>
                                {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                            </div>

                            <div class="form-group col-lg-4 has-feedback">
                                <label>Time 1 </label>
                                <select id="position" name="club1" onclick="combobox()" class="form-control" required="">
                                    <option value="0"> Esolha um time </option>
                                    @foreach($clubs as $club) 
                                    <option value="{{$club->id}}"> {{$club->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-1">VS</div>

                            <div class="form-group col-lg-4 has-feedback">
                                <label>Time 2 </label>
                                <select id="position" name="club2" onclick="combobox()" class="form-control" required="">
                                    <option value="0"> Esolha um time </option>
                                    @foreach($clubs as $club) 
                                    <option value="{{$club->id}}"> {{$club->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                    </section>
                </div>
                <div class="col-md-11">
                    <p class="text-center"><button type="submit" class="btn btn-success btn-success-custom "> Registra nova partida </button> </p>
                </div>
            </form>
                <div class="col-md-11">
                    <p class="text-left"><a type="button" href="{{route('jogos.index')}}" class="btn btn-success btn-success-custom "> Voltar </a> </p>
                </div>
        </section>
    </div>
@endsection