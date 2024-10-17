<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceFraishorsforfait;
use Exception;
use App\Models\Fraishorsforfait;

class FraishorsforfaitController
{
    public function getFraishorsforfaitVisiteur(){
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        try {
            $id=Session::get('id');
            $service=new ServiceFraishorsforfait();
            $mesFraishorsforfait=$service->getFraishorsforfait($id);
            return view('/vues/ListerHorsforfait',compact('mesFraishorsforfait','erreur'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
}
