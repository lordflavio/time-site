@extends('layouts.system')
@section('content')
<div class="container-fluid">
    <div class="row">
        <h1 class="col-md-offset-5 col-sm-offset-6 col-xs-offset-5 h1-curso"> Jogos </h1>
        <div class="col-md-offset-8 col-sm-offset-4 col-xs-offset-2 ">
            <a type="button" href="{{route('jogos.create')}}" class="btn btn-success btn-success-custom  "> Adicionar nova Partida  </a>
        </div><br>
    </div>
    <div class="row">
        <table class="table table-striped">
            <div class="dropdown">
                <button class="btn btn-success btn-success-custom dropdown-toggle pull-right" type="button" data-toggle="dropdown"> <span class="glyphicon glyphicon-check"></span> Opções de Filtragem
                    <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right" style="margin-top: 17px">
                    <li><a href="{{route('Occurred')}}">Já Ocorridos </a></li>
                    <li><a href="{{route('Future')}}">Futuros</a></li>
                </ul>
            </div>
            <thead>
                <tr class="row-name">
<!--                    <th style="width:10%">New/Old</th>-->
                    <th class="text-center">Data</th>
                    <th class="text-center">Horario</th>
                    <th class="text-center">Local</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center"></th>
                    <th class="text-center">Times</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($games as $game)
                <tr class="row-content">
                    @if(strtotime($game->date) < strtotime(date('y-m-d')))
                    <td> <span class="label label-success"> Já Ocorrido </span></td>
                    @else
                     <td> <span class="label label-info"> Futuro </span></td>
                    @endif
                    <td class="text-center ">{{ date("d/m/Y", strtotime($game->date)) }}</td>
                    <td class="text-center">{{$game->time}}</td>
                    <td class="text-center">{{$game->address}}</td>
                    <td style="width:23%" class="text-justify">{{$game->description}}</td>
                    
                    @php($club = $game->game()->get())
                   
                    <td> <img class="center-block" width="40" src="{{$club[0]->shild}}"><br> <p class="text-center">{{$club[0]->name}}</p></td>
                    <td class="text-center">VS</td>
                    <td> <img class="center-block" width="40" src="{{$club[1]->shild}}"><br> <p class="text-center">{{$club[1]->name}}</p></td>
                    
                    <td>
                        <a class="btn btn-danger edit" href="{{route('JogosDelete',$game->id)}}" aria-label="Settings">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        &nbsp 
                        <a class="btn btn-info edit" href="{{route('jogos.edit',$game->id)}}" aria-label="Settings">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection