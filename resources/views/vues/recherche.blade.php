
@extends('layouts.master')
@section('content')
    {!!  Form::open(['url' => 'validateRecherche']) !!}
    <form action="{{ route('Recherche') }}" method="GET">
    <div class="col-md-12  col-sm-12 well well-md">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Recherche libre : </label>
                <div class="col-md-2 col-sm-2">
                    <input type="text" name="libre" value="" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Nom : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="nom">
                        <option value=""></option>
                        @foreach($mesPraticiens as $praticien)
                            <option value="{{$praticien->nom_praticien}}">{{$praticien->nom_praticien}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Prenom : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="prenom">
                        <option value=""></option>
                        @foreach($mesPraticiens as $praticien)
                            <option value="{{$praticien->prenom_praticien}}">{{$praticien->prenom_praticien}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Ville : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="ville">
                        <option value=""></option>
                        @foreach($mesPraticiens as $praticien)
                            <option value="{{$praticien->ville_praticien}}">{{$praticien->ville_praticien}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Specialite : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="id_specialite">
                        <option value=0></option>
                        @foreach($Specialites as $specialite)
                            <option value="{{$specialite->id_specialite}}">{{$specialite->lib_specialite}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Type de Praticien : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="id_type">
                        <option value=0></option>
                        @foreach($types as $type)
                            <option value="{{$type->id_type_praticien}}">{{$type->lib_type_praticien}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok">Valider</span>
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary"
                            onclick="javascript: window.location = ' ';">
                        <span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>


        </div>
    </div>
    </form>
