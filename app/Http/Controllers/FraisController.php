<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceFrais;
use Exception;

class FraisController
{
    public function getFraisVisiteur(){
        $erreur="";
        try {
            $id=Session::get('id');
            $service=new ServiceFrais();
            $mesFrais=$service->getFrais($id);
            return view('/vues/listeFrais',compact('erreur','mesFrais'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
}
