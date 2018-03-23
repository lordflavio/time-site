@extends('layouts.system')
@section('content')

<div class="container-fluid">
    <div>
        <img class="center-block img-responsive" src="{{ $item->img }}" width="250" alt="New"/>
    </div>
    <div class="row">
        <form action="{{route('itens.update',$item->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <section class="hast">
                <div class="col-md-6">
                    <h3 class="dark-grey">Adicionar Item ou Produto </h3><br>

                    <div class="form-group col-lg-8 has-feedback">
                        <label>Nome:</label>
                        <input type="text" name="title" class="form-control" id="nome" value="{{$item->title}}" required="">
                        <span class="fa fa-edit form-control-feedback form-control-feedback-custom"></span>
                    </div>

                    <div class="form-group col-lg-4 has-feedback">
                        <label>Preço:</label>
                        <input type="text" name="price" class="form-control" id="nome" value="{{$item->price}}" required="">
                        <span class="fa fa-money form-control-feedback form-control-feedback-custom"></span>
                    </div>

                    <div class="form-group col-lg-12 ">
                        <label class="control-label" for="img">Upload Imagem</label>
                        <input id="img" name="img" class="input-file" type="file">
                    </div>
                </div>

                <div class="form-group col-lg-8 ">
                    <p class="text-left"><button type="submit" class="btn btn-success btn-success-custom "> Salva </button> <a href="{{route('home')}}" type="button" class="btn btn-success btn-success-custom "> <i class="fa fa-arrow-left" aria-hidden="true"></i> voltar  </a></p>
                </div> 
            </section>
        </form>
    </div>
</div>

@endsection



