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
        <form action="{{route('clubes.store')}}" method="post" enctype="multipart/form-data">
            {{ method_field('POST')}}
            {{ csrf_field() }}
            <div class="panel-body">
                <section class="hast">
                    <div class="col-md-11">
                        <h3 class="dark-grey">Novo Clube</h3><br>

                        <div class="form-group col-lg-7 has-feedback">
                            <label>Nome:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Nome do Jogador" required="">
                            <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                        </div>
                        
                        <div class="form-group col-lg-7 has-feedback ">
                            <label >Descrição:</label>
                            <textarea  name="description" class="form-control" style="height: 100px"  id="descIns" placeholder="Descrição...">{{ old('description') }}</textarea>
                            {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                        </div>
                        
                        <div class="form-group col-lg-8 ">
                            <label class="col-md-3 control-label" for="img">Upload Imagem</label>
                            <input id="img" name="shild" class="input-file" type="file">
                        </div>
                </section>
            </div>
            <div>
                <p class="text-left"><button type="submit" class="btn btn-success btn-success-custom "> Adicionar Clube </button> <a href="{{route('clubes.index')}}" type="button" class="btn btn-success btn-success-custom "> <i class="fa fa-arrow-left" aria-hidden="true"></i> voltar  </a></p>
            </div>
        </form>
    </div>
</div></br>



@endsection