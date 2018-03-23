@extends('layouts.system')
@section('content')
<div class="container-fluid">
    <div class="row">
         <div>
            <img class="center-block img-responsive" src="{{ $club->shild }}" width="250" alt="Club"/>
        </div>
        <form action="{{route('clubes.update',$club->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <div class="panel-body">
                <section class="hast">
                    <div class="col-md-11">
                        <h3 class="dark-grey">Modifique Informações do Clube </h3><br>

                        <div class="form-group col-lg-7 has-feedback">
                            <label>Nome:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $club->name }}" placeholder="Nome do Jogador" required="">
                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                        </div>
                        
                        <div class="form-group col-lg-7 has-feedback ">
                            <label >Descrição:</label>
                            <textarea  name="description" class="form-control" style="height: 100px"  id="descIns" placeholder="Descrição...">{{ $club->description }}</textarea>
                            {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                        </div>
                        
                        <div class="form-group col-lg-8 ">
                            <label class="col-md-3 control-label" for="img">Upload Imagem</label>
                            <input id="img" name="shild" class="input-file" type="file">
                        </div>
                </section>
            </div>
            <div>
                <p class="text-left"><button type="submit" class="btn btn-success btn-success-custom "> Salva </button> <a href="{{route('clubes.index')}}" type="button" class="btn btn-success btn-success-custom "> <i class="fa fa-arrow-left" aria-hidden="true"></i> voltar  </a></p>
            </div>
        </form>
    </div>
</div></br>

@endsection