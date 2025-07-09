@extends("layouts.master")
@section('content')
    {!!  Form::open(['url' => 'validateSpePraticien']) !!}
    <div class="col-md-12 col-sm-12 well well-md">
        <h1> {{$titreVue}}</h1>

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Usage : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="usage">
                        <option value="">Modification</option>
                        <option value="aa">Ajout</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Praticien : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="id_praticien">
                        @foreach($mesPraticiens as $praticien)
                            <option value="{{$praticien->id_praticien}}">{{$praticien->nom_praticien}} {{$praticien->prenom_praticien}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Specialite : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="id_specialite">
                    @foreach($Specialites as $specialite)
                        <option value="{{$specialite->id_specialite}}">{{$specialite->lib_specialite}}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Diplôme : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="text" name="diplome" value="" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Coefficient : </label>
                <div class="col-md-2  col-sm-2">
                    <input type="number" step="0.01" name="coef_prescription" value=""  class="form-control" placeholder="Nombre de justificatifs" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span>Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript:if(confirm('vous êtes sûr ?'))
                                        window.location='{{url('/')}}';">
                        <span class="glyphicon glyphicon-remove"></span>Annuler</button>
                </div>
            </div>
        </div>
    </div>
@stop
