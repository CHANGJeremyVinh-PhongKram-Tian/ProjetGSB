<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServicePosseder;
use App\dao\ServicePraticien;
use App\dao\ServiceSpecialite;
use App\Models\Praticien;
use Exception;
use App\Models\Posseder;
class PossederController
{
    public function updateSpePraticien($id_praticien,$id_specialite)
    {
        try {
            $titreVue = "Modifer les informations";
            $servicePosseder = new ServicePraticien();
            $mesPraticiens = $servicePosseder->getPraticienByid($id_praticien);
            $serviceSpecialite = new ServiceSpecialite();
            $Specialites= $serviceSpecialite->getSpecialiteById($id_specialite);


            return view('vues/formPraticienSpe', compact('titreVue', 'mesPraticiens', 'Specialites'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function validateSpePraticien(Request $request){
        $erreur="";
        try {
            $usage=$request->input('usage');
            $id_specialite=$request->input('id_specialite');
            $id_praticien=$request->input('id_praticien');
            $diplome=$request->input('diplome');
            $coef_prescription=$request->input('coef_prescription');
            $servicePosseder = new ServicePosseder();
            if ($usage == ""){
                $servicePosseder->updatePosseder($id_praticien,$id_specialite,$diplome,$coef_prescription);
            }
            else{
                $Posseder=new ServicePosseder();
                $Posseder->insertPosseder($id_praticien,$id_specialite,$diplome,$coef_prescription);
            }
            return redirect(route('ListerSpe',[$id_praticien]));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }

    public function addSpecialite()
    {
        $erreur="";
        try {
            $titreVue = 'Ajout d\'une specialite à un praticien';
            $service=new ServicePraticien();
            $mesPraticiens=$service->getPraticien();
            $specialite=new ServiceSpecialite();
            $Specialites=$specialite->getSpecialite();
            return view('vues/formPraticienSpe',compact('titreVue','mesPraticiens','Specialites'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
    public function removeSpePraticien($id_praticien,$id_specialite)
    {
        $erreur="";
        try {
            $servicePosseder = new ServicePosseder();
            $servicePosseder->deletePosseder($id_praticien,$id_specialite);
        } catch (\Exception $e){
            Session::put('erreur', $e->getMessage());
        }
        return redirect('/Lister');
    }
}
