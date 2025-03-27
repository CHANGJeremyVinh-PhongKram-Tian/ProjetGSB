
<h1> </h1>
<table class="table table-bordered table-striped table-responsive">
    <thead>
    <th style="width:30%">Nom</th>
    <th style="width:30%">Prénom</th>
    <th style="width:20%">Modifier</th>
    <th style="width:20%">Supprimer</th>
    </thead>
    @foreach($mesPraticiens as $praticien)
        <tr>
            <td>{{$praticien->nom_praticien}} </td>
            <td>{{$praticien->prenom_praticien}} </td>
            <td style="text-align:center;">
                <a href="{{url('/modifierpraticien') }}/{{$praticien->id_praticien }}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                </a>
            </td>
            <td style="text-align:center;">
                <a onclick="javascript:if (confirm('Suppression confirmée ?')) {
                    window.location='{{ url('/removepraticien')}}/{{$praticien->id_praticien }}'
					}">
                        <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                              title="Supprimer"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>
@include('vues/error')
