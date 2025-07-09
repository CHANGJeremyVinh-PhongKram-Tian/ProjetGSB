
<h1> </h1>
<table class="table table-bordered table-striped table-responsive">
    <thead>
    <th style="width:30%">Date Activité</th>
    <th style="width:30%">Lieu Activité</th>
    <th style="width: 20%">Thème Activité</th>
    <th style="width: 20%">Motif</th>
    <th style="width: 20%">Specialiste</th>
    <th style="width: 20%">Modifier</th>
    <th style="width:20%">Supprimer</th>
    </thead>
    @foreach($ActivitePraticien as $activite)
        <tr>
            <td>{{$activite->date_activite}} </td>
            <td>{{$activite->lieu_activite}} </td>
            <td>{{$activite->theme_activite}}</td>
            <td>{{$activite->motif_activite}}</td>
            <td>{{$activite->specialiste}}</td>
            <td style="text-align:center;">
                <a href="{{url('/modifierActPraticien') }}/{{$activite->id_praticien }}/{{$activite->id_activite_compl}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                </a>
            </td>
            <td style="text-align:center;">
                <a onclick="javascript:if (confirm('Suppression confirmée ?')) {
                   window.location='{{ url('/removeActPraticien')}}/{{$activite->id_praticien }}/{{$activite->id_activite_compl}}'
					}">
                        <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                              title="Supprimer"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>
@include('vues/error')
