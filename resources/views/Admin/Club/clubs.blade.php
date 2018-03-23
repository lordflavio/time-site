@extends('layouts.system')
@section('content')
<div class="container-fluid">
    <div class="row">
        <h1 class="col-md-offset-5 col-sm-offset-6 col-xs-offset-5 h1-curso"> Clubs </h1>
        <div class="col-md-offset-8 col-sm-offset-4 col-xs-offset-2 ">
            <a type="button" href="{{route('clubes.create')}}" class="btn btn-success btn-success-custom  "> Adicionar novo clubs  </a>
        </div>
        <hr style="padding-top: 50px">
        <div class="hast">
            <!-- Boxes de Acoes -->
            @foreach($clubs as $club)
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="box">
                    <div class="icon">
                        <div><img class="img-rounded" src="{{$club->shild}}" width="120" height="100" alt="Curso"></div>
                        <div class="info">
                            <h3 class="title">{{$club->name}}</h3>
                            <p class="text-center"><b>Descrição: </b></p>
                            <p class="text-justify">{{$club->description}}</p></p>
                            <div class="more">
                                <div class="col-md-offset-9">
                                    <a href="{{route('clubes.edit',$club->id)}}" title="Editar">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{route('ClubsDelete',$club->id)}}" title="Remover">
                                        <i class="fa fa-bitbucket"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
            @endforeach
        </div>
        </br>
    </div>
</div>


@endsection