<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title or 'Admim' }}</title>

    <!-- Icon -->
<!--    <link rel="shortcut icon" href="{{asset('/imagens/ico.png')}}" />-->

    <!-- Styles -->
    <link href="/css/system-style.css" rel="stylesheet">
    <link href="/css/toastr.min.css" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
<!--    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>-->

</head>
<body class="body-background">
<div id="wrapper">
    <div id="sidebar-wrapper">
        <a href="#"><img class="logo" src="{{'#'}}" width="200" height="70" alt="ADMIN"></a>
        <aside id="sidebar">
            <ul id="sidemenu" class="sidebar-nav">
                <li>
                    <a href="/home">
                        <span class="sidebar-icon"><i class="fa fa-home"></i></span>
                        <span class="sidebar-title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="/clubes">
                        <span class="sidebar-icon"><i class="fa fa-futbol-o"></i></span>
                        <span class="sidebar-title">Clubes</span>
                    </a>
                </li>
               
                <li>
                    <a href="/jogadores">
                        <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                        <span class="sidebar-title">Jogadores</span>
                    </a>
                </li>
                
                <li>
                    <a href="/jogos">
                        <span class="sidebar-icon"><i class="fa fa-trophy"></i></span>
                        <span class="sidebar-title">Jogos</span>
                    </a>
                </li>
                
                <li>
                    <a href="/tabela">
                        <span class="sidebar-icon"><i class="fa fa-table"></i></span>
                        <span class="sidebar-title">Tabela</span>
                    </a>
                </li>
                
                <li>
                    <a href="/home/#noticias">
                        <span class="sidebar-icon"><i class="fa fa-bullhorn"></i></span>
                        <span class="sidebar-title">Notícias</span>
                    </a>
                </li>
                
                <li>
                    <a href="/home/#itens">
                        <span class="sidebar-icon"><i class="fa fa-shopping-cart"></i></span>
                        <span class="sidebar-title">Itens</span>
                    </a>
                </li>
                
                <li>
                    <a href="/home/#apoio">
                        <span class="sidebar-icon"><i class="fa fa-handshake-o"></i></span>
                        <span class="sidebar-title">Apoio</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
    <main id="page-content-wrapper" role="main">
        <div id="navbar-wrapper">
            <header>
                <nav class="navbar navbar-default navbar-inverse navbar-inverse-custom" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav  navbar-right ">
                                <li class="dropdown">
                                    <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="./images/admin.png" class="img-responsive img-thumbnail img-circle"> <p> {{ Auth::user()->name }} <b class="caret pull-right"></b> </p>  </a>
                                    <ul class="dropdown-menu dropdown-menu-custom" role="menu">
                                    <li><a style="cursor: pointer" href="#">Perfil <span class="glyphicon glyphicon-user pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                                Logout <span class="glyphicon glyphicon-log-out pull-right"></span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <div class="login-magin"></div>
        @yield('content')
        <footer>
            <div class="col-md-12">
                <p class="text-center">Copyright © 2017  <a href="#">Flávio Freelancer.</a> All rights reserved </p>
            </div>
        </footer>
    </main>
</div>

<!-- Scripts -->
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="{{asset('js/toastr.min.js' )}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery.mask.js' )}}"></script>
<script src="/js/myjs.js"></script>




<script>
    $(document).ready(function () {

        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 5000
            };
            @if(Session::has('success')) //store
            toastr.success('{{ Session::get("success") }}');

            @elseif(Session::has('update')) //Edit
            toastr.warning('{{ Session::get("update") }}');

            @elseif(Session::has('info')) //Edit
            toastr.info('{{ Session::get("info") }}');

            @elseif(Session::has('warning'))// Delete
            toastr.error('{{ Session::get("warning") }}');
            @endif
        }, 1000);
    });
</script>

</body>
</html>
