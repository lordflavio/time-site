@extends('layouts.system')
@section('content')
<div class="container-fluid">
    <div class="row">
    <!--News-->
        <section id="noticias">
             <h1 class="text-center"> Noticías </h1><br>
            <div class="col-md-offset-0 col-sm-offset-4 col-xs-offset-2">
                <a type="button" data-toggle="modal" data-target="#newsform" class="btn btn-success btn-success-custom  "> Adicionar Novo </a>
            </div><br>

            <div class="row" >
                <div class="col-md-12">
                    @foreach($news as $new) 
                    <div class="col-lg-4">
                        <p class="text-center">{{$new->title}}</p>
                        <img style="width: 300px; height: 150px;" class="center-block" src="{{$new->img}}"  alt="Anuncio" />
                        <p class="text-center">{{$new->date}}</p>
                        <p class="text-center"> 
                            <a href="{{route('NewsDelete',$new->id)}}"> <button type="button" class=" btn btn-danger edit"><i class="fa fa-trash" title="Excluir" aria-hidden="true"></i></button></a>
                            <a href="{{route('noticias.edit',$new->id)}}"> <button type="button" class=" btn btn-info edit"><i class="fa fa-pencil-square-o" title="Modificar" aria-hidden="true"></i></button></a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <!--Items-->
    <div class="row">
        <hr class="h-custom">
        <section id="itens">
            <h1 class="text-center"> Itens ou Produtos  </h1><br>
            <div class="col-md-offset-0 col-sm-offset-4 col-xs-offset-2">
                <a type="button" data-toggle="modal" data-target="#iten" class="btn btn-success btn-success-custom  "> Adicionar Novo </a>
            </div><br>
            <div class="row" >
                <div class="col-md-12">
                    @foreach($items as $item) 
                    <div class="col-lg-4">
                        <p class="text-center">{{$item->title}}</p>
                        <img style="width: 300px; height: 150px;" class="center-block" src="{{$item->img}}"  alt="Anuncio" />
                        <p class="text-center">R$: {{$item->price}}</p>
                        <p class="text-center"> 
                            <a href="{{route('ItensDelete',$item->id)}}"> <button type="button" class=" btn btn-danger edit"><i class="fa fa-trash" title="Excluir" aria-hidden="true"></i></button></a>
                            <a href="{{route('itens.edit',$item->id)}}"> <button type="button" class=" btn btn-info edit"><i class="fa fa-pencil-square-o" title="Modificar" aria-hidden="true"></i></button></a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>

    <div class="row">
    <!--Baking-->
        <hr class="h-custom">
        <section id="apoio">
             <h1 class="text-center"> Apoio ou Patrocinador </h1><br>
            <div class="col-md-offset-0 col-sm-offset-4 col-xs-offset-2">
                <a type="button" data-toggle="modal" data-target="#anuncio" class="btn btn-success btn-success-custom  "> Adicionar Novo </a>
            </div><br>

            <div class="row" >
                <div class="col-md-12">
                    @foreach($backings as $back) 
                    <div class="col-lg-4">
                        <img style="width: 300px; height: 150px;" class="center-block" src="{{$back->img}}"  alt="Anuncio" />
                        <p class="text-center">{{$back->name}}</p>
                       <p class="text-center"> 
                            <a href="{{route('BackingDelete',$back->id)}}"> <button type="button" class=" btn btn-danger edit"><i class="fa fa-trash" title="Excluir" aria-hidden="true"></i></button></a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    
<!--Anuciantes-->
<div class="modal fade" id="anuncio" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Adicionar Apio ou Patrocinador</h4>
            </div>
            <form action="{{route('apoio.store')}}" method="post" enctype="multipart/form-data">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <div class="panel-body">
                    <section class="hast">
                        <div class="col-md-10">
                            <h3 class="dark-grey">Adicionar Apio ou Patrocinador</h3><br>
                            
                            <div class="form-group col-lg-12 has-feedback">
                                <label>Nome:</label>
                                <input type="text" name="name" class="form-control" id="nome" value="" placeholder="Ex: Casas Bahia" required="">
                                <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                            </div>
                            
                            <div class="form-group col-lg-12 ">
                                <label class="col-md-6 control-label" for="img">Upload Imagem</label>
                                <input id="img" name="img" class="input-file" type="file">
                            </div>
                        </div>
                    </section>
                </div>
                <div class="panel-footer" style="margin-bottom:-14px;">
                    <input type="submit" class="btn btn-success btn-success-custom" value="Adicionar"/>
                    <!--<span class="glyphicon glyphicon-remove"></span>-->
                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Anuciantes-->
<div class="modal fade" id="iten" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Adicionar Novo Iten ou Produto </h4>
            </div>
            <form action="{{route('itens.store')}}" method="post" enctype="multipart/form-data">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <div class="panel-body">
                    <section class="hast">
                        <div class="col-md-10">
                            <h3 class="dark-grey">Adicionar Item ou Produto </h3><br>
                            
                            <div class="form-group col-lg-12 has-feedback">
                                <label>Nome:</label>
                                <input type="text" name="title" class="form-control" id="nome" value="{{old('title')}}" placeholder="Ex: Casas Bahia" required="">
                                <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                            </div>
                            
                            <div class="form-group col-lg-12 has-feedback">
                                <label>Preço:</label>
                                <input type="text" name="price" class="form-control" id="nome" value="{{old('price')}}" placeholder="Ex: 15,00" required="">
                                <span class="fa fa-money form-control-feedback form-control-feedback-custom"></span>
                            </div>
                            
                            <div class="form-group col-lg-12 ">
                                <label class="col-md-6 control-label" for="img">Upload Imagem</label>
                                <input id="img" name="img" class="input-file" type="file">
                            </div>
                        </div>
                    </section>
                </div>
                <div class="panel-footer" style="margin-bottom:-14px;">
                    <input type="submit" class="btn btn-success btn-success-custom" value="Adicionar"/>
                    <!--<span class="glyphicon glyphicon-remove"></span>-->
                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--news-->
<div class="modal fade" id="newsform" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Notícias </h4>
            </div>
            <form action="{{route('noticias.store')}}" method="post" enctype="multipart/form-data">
                {{ method_field('POST')}}
                {{ csrf_field() }}
                <div class="panel-body">
                    <section class="hast">
                        <div class="col-md-10">
                            <h3 class="dark-grey">Criar nova Noticia </h3><br>
                            
                            <div class="form-group col-lg-8 has-feedback">
                                <label>Título:</label>
                                <input type="text" name="title" class="form-control" id="nome" value="{{old('title')}}"  required="">
                                <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                            </div>
                            
                            <div class="form-group col-lg-4 has-feedback">
                                <label>Data:</label>
                                <input type="date" name="date" class="form-control" id="nome" value="{{old('date')}}"  required="">
                                <span class="fa fa-calendar form-control-feedback form-control-feedback-custom"></span>
                            </div>
                            
                            <div class="form-group col-lg-12 has-feedback">
                                <label>Autor</label>
                                <input type="text" name="author" class="form-control" id="nome" value="{{old('author')}}" placeholder="Ex: Carlos" required="">
                                <span class="fa fa-user-circle-o form-control-feedback form-control-feedback-custom"></span>
                            </div>
                            
                            <div class="form-group col-lg-12 has-feedback ">
                                <label >Conteudo da Notícia:</label>
                                <textarea  name="matter" class="form-control" style="height: 100px">{{old('matter')}}</textarea>
                                {{--<span class="fa fa-hourglass-start form-control-feedback form-control-feedback-custom"></span>--}}
                            </div>
                            
                            <div class="form-group col-lg-8 ">
                                <label class="col-md-6 control-label" for="img">Upload Imagem</label>
                                <input id="img" name="img" class="input-file" type="file">
                            </div>
                        </div>
                    </section>
                </div>
                <div class="panel-footer" style="margin-bottom:-14px;">
                    <input type="submit" class="btn btn-success btn-success-custom" value="Adicionar"/>
                    <!--<span class="glyphicon glyphicon-remove"></span>-->
                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
