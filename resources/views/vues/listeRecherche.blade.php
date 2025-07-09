<button>
    <a href="/Recherche" data-toggle="collapse" data-target=".navbar-collapse.in">Recherche</a>
</button>
<h1>Liste des praticien</h1>
<table class="table table-bordered table-striped table-responsive">
    <thead>
    <th style="width:30%">Nom</th>
    <th style="width:30%">Prénom</th>
    <th style="width:30%">Ville</th>
    <th style="width:30%">Type de praticien</th>
    <th style="width: 20%">Spécialité</th>
    <th style="width: 20%">Modifier Spécialité</th>
    </thead>
    @foreach($recherche as $recher)
        <tr>
            <td>{{$recher->nom_praticien}} </td>
            <td>{{$recher->prenom_praticien}} </td>
            <td>{{$recher->ville_praticien}}</td>
            <td>{{$recher->lib_type_praticien}}</td>
            <td>{{$recher->lib_specialite}}</td>
            <td style="text-align:center;">
                <a href="{{url('/modifierSpePraticien') }}/{{$recher->id_praticien }}/{{$recher->id_specialite}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                </a>
            </td>
        </tr>
    @endforeach
</table>
@include('vues/error')
