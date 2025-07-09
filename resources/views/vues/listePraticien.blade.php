<button>
    <a href="/Recherche" data-toggle="collapse" data-target=".navbar-collapse.in">Recherche</a>
</button>
<h1>Liste des praticien</h1>
<table class="table table-bordered table-striped table-responsive">
    <thead>
    <th style="width:30%">Nom</th>
    <th style="width:30%">Prénom</th>
    <th style="width: 20%">Spécialité</th>
    <th style="width: 20%">Activité</th>
    <th style="width: 20%">Ville</th>
    </thead>
    @foreach($mesPraticiens as $praticien)
        <tr>
            <td>{{$praticien->nom_praticien}} </td>
            <td>{{$praticien->prenom_praticien}} </td>
            <td style="text-align:center;">
                <a href="{{url('/ListerSpe') }}/{{$praticien->id_praticien }}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                </a>
            </td>
            <td style="text-align:center;">
                <a href="{{url('/ListerAct') }}/{{$praticien->id_praticien }}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                </a>
            </td>
            <td>{{$praticien->ville_praticien}} </td>
        </tr>
    @endforeach
</table>
@include('vues/error')
