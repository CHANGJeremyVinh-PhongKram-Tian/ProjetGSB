<?php

namespace App\Http\Controllers;

use App\dao\ServiceActivite;
use Illuminate\Support\Facades\Session;
class ActiviteController
{
    public function getPraticienAct($idPracticien)
    {
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        try {
            $titre="";
            $service=new ServiceActivite();
            $ActivitePraticien=$service->getActivitesByPracticien($idPracticien);
            return view('/vues/listeActivite',compact('ActivitePraticien','erreur'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
}
