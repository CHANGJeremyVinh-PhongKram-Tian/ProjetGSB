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
    public function validerFrais(Request $request){
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
                $id_visiteur=$request->input('id_visiteur');
                $serviceFrais->inserFrais($id_frais,$anneemois,$nbjustificatifs);
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

}
