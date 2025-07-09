<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\dao\ServiceInviter;
use App\dao\ServicePraticien;
use App\dao\ServiceActivite;
use App\Models\Praticien;
use Exception;
use App\Models\Inviter;
class InviterController
{

    public function updateActPraticien($id_praticien,$id_activite)
    {
        try {
            $titreVue = "Modifer les informations";
            $serviceInviter = new ServicePraticien();
            $mesPraticiens = $serviceInviter->getPraticienByid($id_praticien);
            $serviceactivite = new Serviceactivite();
            $activites= $serviceactivite->getactiviteById($id_activite);


            return view('vues/formPraticienAct', compact('titreVue', 'mesPraticiens', 'activites'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }
    public function validateActPraticien(Request $request){
        $erreur="";
        try {
            $usage=$request->input('usage');
            $id_activite=$request->input('id_activite');
            $id_praticien=$request->input('id_praticien');
            $specialiste=$request->input('specialiste');
            $serviceInviter = new ServiceInviter();
            if ($usage == ""){
                $serviceInviter->updateInviter($id_activite,$id_praticien,$specialiste);
            }
            else{
                $Inviter=new ServiceInviter();
                $Inviter->insertInviter($id_praticien,$id_activite,$specialiste);
            }
            return redirect(route('ListerAct',[$id_praticien]));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }

    public function addActivite()
    {
        $erreur="";
        try {
            $titreVue = 'Ajout d\'une activite à un praticien';
            $service=new ServicePraticien();
            $mesPraticiens=$service->getPraticien();
            $activite=new ServiceActivite();
            $activites=$activite->getactivite();
            return view('vues/formPraticienAct',compact('titreVue','mesPraticiens','activites'));
        } catch (\Exception $e){
            $erreur=$e->getMessage();
            return view('vues/error',compact('erreur'));
        }
    }
    public function removeActPraticien($id_praticien,$id_activite)
    {
        $erreur="";
        try {
            $serviceInviter = new Serviceinviter();
            $serviceInviter->deleteInviter($id_praticien,$id_activite);
        } catch (\Exception $e){
            Session::put('erreur', $e->getMessage());
        }
        return redirect('/Lister');
    }
}
