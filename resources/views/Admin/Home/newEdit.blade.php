@extends('layouts.system')
@section('content')

<div class="container-fluid">
        <div>
            <img class="center-block img-responsive" src="{{ $new->img }}" width="250" alt="New"/>
        </div>
    <div class="row">
        <form action="{{route('noticias.update',$new->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <section class="hast">
                <div class="col-md-8">
                    <h3 class="dark-grey">Criar nova Noticia </h3><br>

                    <div class="form-group col-lg-8 has-feedback">
                        <label>Título:</label>
                        <input type="text" name="title" class="form-control" id="nome" value="{{ $new->title }}"  required="">
                        <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                    </div>

                    <div class="form-group col-lg-4 has-feedback">
                        <label>Data: {{date("d/m/Y", strtotime($new->date))}} </label>
                        <input type="date" name="date" class="form-control" id="nome">
                        <span class="form-control-feedback form-control-feedback-custom"></span>
                    </div>

                    <div class="form-group col-lg-12 has-feedback">
                        <label>Autor</label>
                        <input type="text" name="author" class="form-control" id="nome" value="{{$new->author}}" placeholder="Ex: Carlos" required="">
                        <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                    </div>

                    <div class="form-group col-lg-12 has-feedback ">
                        <label >Conteudo da Notícia:</label>
                        <textarea  name="matter" class="form-control" style="height: 100px">{{$new->matter}}</textarea>
                        {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                    </div>

                    <div class="form-group col-lg-8 ">
                        <label class="col-md-6 control-label" for="img">Upload Imagem</label>
                        <input id="img" name="img" class="input-file" type="file">
                    </div>
                    
                    <div class="form-group col-lg-8 ">
                       <p class="text-left"><button type="submit" class="btn btn-success btn-success-custom "> Salva </button> <a href="{{route('home')}}" type="button" class="btn btn-success btn-success-custom "> <i class="fa fa-arrow-left" aria-hidden="true"></i> voltar  </a></p>
                    </div> 
                </div>
            </section>
           
        </form>
    </div>
</div>

@endsection

