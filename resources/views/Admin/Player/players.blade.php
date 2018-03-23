@extends('layouts.system')
@section('content')
<div class="container-fluid">
    <div class="row">
        <h1 class="col-md-offset-5 col-sm-offset-6 col-xs-offset-5 h1-curso"> Jogadores   </h1>
        <div class="col-md-offset-8 col-sm-offset-4 col-xs-offset-2 ">
            <a type="button" href="{{route('jogadores.create')}}" class="btn btn-success btn-success-custom  "> Adicionar novo jogador  </a>
        </div>
        <hr style="padding-top: 50px">
        <div class="hast">
            <!-- Boxes de Acoes -->
            @foreach($players as $player)
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="box">
                    <div class="icon">
                        <div><img class="img-rounded" src=".{{$player->img}}" width="180" height="190" alt="Jogador"></div>
                        <div class="info">

                            <h3 class="title">{{$player->name}}</h3>
                            <p class="text-left"><b>Posição: </b>{{$player->position}}</p>
                            <p class="text-left"><b>Camisa: </b>{{$player->number}}</p></p>
                            <div class="more">
                                <div class="col-md-offset-9">
                                    <a href="{{route('jogadores.edit',$player->id)}}" title="Editar">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{route('PlayerDelete',$player->id)}}" title="Remover">
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