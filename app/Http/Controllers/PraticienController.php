<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServicePraticien;
use Exception;
use App\Models\Praticien;

class PraticienController
{
    public function getPraticiens(){
        $erreur=Session::get('erreur');
        Session::forget('erreur');
        try {
            $service=new ServicePraticien();
            $mesPraticiens=$service->getPraticien();
            return view('/vues/listePraticien',compact('mesPraticiens','erreur'));
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
    public function addPraticien()
    {
        $erreur="";
        try {
            $unPraticien = new Praticien();
            $unPraticien->id_praticien=0;
            $titreVue = 'Ajout d\'une liste de Praticien';
            return view('vues/formPraticien',compact('titreVue','unPraticien'));
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
    public function Ajouterpraticien()
    {
        $erreur = "";
        try {
            $title = "Ajouter un adhérent";
            $praticien = new praticien();

            return view('vues/FormAjouterpraticien', compact('title', 'praticien'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }

    }

    public function validerpraticien(Request $request)
    {
        try {
            $serviceAdmin = new ServiceAdmin();
            $id_praticien = $request->input('hid_id');
            if ($id_praticien == 0) {
                $praticien = new praticien();
            } else {
                $praticien = $serviceAdmin->getpraticien($id_praticien);
            }
            $praticien->nom_praticien = $request->input('nom');
            $praticien->prenom_praticien = $request->input('prenom');
            $praticien->adresse_praticien = $request->input('adresse');
            $praticien->cp_praticien = $request->input('codePostal');
            $praticien->ville_praticien = $request->input('ville');
            $praticien->coef_notoriete = $request->input('coefficient');
            $praticien->id_type_praticien = $request->input('typePraticien');


            $serviceAdmin->savepraticien($praticien);
            return redirect('Lister');

        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function modifierpraticien($id)
    {
        try {
            $title = "Modifer les informations";
            $serviceAdmin = new ServiceAdmin();
            $praticien = $serviceAdmin->getpraticien($id);

            return view('vues/FormAjouterpraticien', compact('title', 'praticien'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

}
