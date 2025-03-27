<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceFrais;
use Exception;
use App\Models\Frais;

class FraisController
{
    public function getFraisVisiteur(){
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        try {
            $id=Session::get('id');
            $service=new ServiceFrais();
            $mesFrais=$service->getFrais($id);
            return view('/vues/listeFrais',compact('mesFrais','erreur'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
    public function updatefrais($id_frais)
    {
        $erreur="";
        try {
            $serviceFrais = new ServiceFrais();
            $unFrais = $serviceFrais->getByid($id_frais);
            $titreVue = 'Modification d\'une liste de frais';
            return view('vues/formFrais',compact('titreVue','unFrais'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
    public function validateFrais(Request $request){
        $erreur="";
        try {
            $id_frais=$request->input('id_frais');
            $anneemois=$request->input('anneemois');
            $nbjustificatifs=$request->input('nbjustificatifs');
            $serviceFrais = new ServiceFrais();
            if ($id_frais>0){
                $serviceFrais->updateFrais($id_frais,$anneemois,$nbjustificatifs);
            }
            else{
                $id_visiteur=Session::get('id');
                $serviceFrais->inserFrais($id_visiteur,$anneemois,$nbjustificatifs);
            }
            return redirect('/Lister');
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
    public function addFrais()
    {
        $erreur="";
        try {
            $unFrais = new Frais();
            $unFrais->id_frais=0;
            $titreVue = 'Ajout d\'une liste de frais';
            return view('vues/formFrais',compact('titreVue','unFrais'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }

    public function removeFrais($id_frais)
    {
        $erreur="";
        try {
            $serviceFrais = new ServiceFrais();
            $serviceFrais->deleteFrais($id_frais);
        } catch (\Exception $e){
            Session::put('erreur', $e->getMessage());
        }
        return redirect('/Lister');
    }


}
