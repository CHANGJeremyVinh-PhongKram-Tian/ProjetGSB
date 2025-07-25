<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/gsb.css') !!}
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">GSB Frais</a>
                    </div>
                    @if(Session::get('id')==0)
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{url('/formLogin')}}"data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                        </ul>
                    </div>
                    @endif
                    @if(Session::get('id')>0)
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav">
                            <li><a href="/Lister" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
                            <li><a href="/insertSpePraticien" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter ou Modifier une Spécialité</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="/insertActPraticien" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter ou Modifier une Spécialité</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{url('/getLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in">({{Session::get('login')}}) Se déconnecter</a></li>
                        </ul>
                    </div>
                    @endif
                </div><!--/.container-fluid -->
            </nav>
        </div>
        <div class="container">
            @yield('content')

        </div>

    </body>
</html>
