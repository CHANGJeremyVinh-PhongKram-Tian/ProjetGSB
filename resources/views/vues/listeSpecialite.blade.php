
<h1> </h1>
<table class="table table-bordered table-striped table-responsive">
    <thead>
    <th style="width:30%">Spécialite</th>
    <th style="width:30%">Diplome</th>
    <th style="width: 20%">Coefficient Prescription</th>
    <th style="width: 20%">Modifier</th>
    <th style="width:20%">Supprimer</th>
    </thead>
    @foreach($SpecialitePraticien as $specialite)
        <tr>
            <td>{{$specialite->lib_specialite}} </td>
            <td>{{$specialite->diplome}} </td>
            <td>{{$specialite->coef_prescription}}</td>
            <td style="text-align:center;">
                <a href="{{url('/modifierSpePraticien') }}/{{$specialite->id_praticien }}/{{$specialite->id_specialite}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top"
                          title="Modifier">
                    </span>
                </a>
            </td>
            <td style="text-align:center;">
               <a onclick="javascript:if (confirm('Suppression confirmée ?')) {
                   window.location='{{ url('/removeSpePraticien')}}/{{$specialite->id_praticien }}/{{$specialite->id_specialite}}'
					}">
                        <span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top"
                              title="Supprimer"></span>
                </a>
            </td>
        </tr>
    @endforeach
</table>
@include('vues/error')
