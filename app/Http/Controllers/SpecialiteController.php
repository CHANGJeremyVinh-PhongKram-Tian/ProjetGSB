<?php

namespace App\Http\Controllers;

use App\dao\ServiceSpecialite;
use Illuminate\Support\Facades\Session;

class SpecialiteController
{
    public function getPraticienSpe($idPracticien)
    {
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        try {
            $titre="";
            $service=new ServiceSpecialite();
            $SpecialitePraticien=$service->getSpecialitesByPracticien($idPracticien);
            return view('/vues/listeSpecialite',compact('SpecialitePraticien','erreur'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
    public function getSpecialitesById($idSpecialite){

    }
}
