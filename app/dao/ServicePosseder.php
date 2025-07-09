<?php


namespace App\dao;

use App\Models\Praticien;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
class ServicePosseder
{
    public function updatePosseder($id_Praticien,$id_Specialite,$diplome,$coef_prescription){
        try {
            $posseder = DB::table('posseder')
                ->where('id_specialite', '=', $id_Specialite)
                ->where('id_praticien', '=', $id_Praticien)
                ->update(['diplome'=>$diplome,'coef_prescription'=>$coef_prescription]);

        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function insertPosseder($id_praticien,$id_specialite,$diplome,$coef_prescription): void
    {
        try {
            DB::table('posseder')
                ->insert(['id_praticien'=>$id_praticien,
                    'id_specialite'=>$id_specialite,
                    'diplome'=>$diplome,
                    'coef_prescription'=>$coef_prescription
                    ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function deletePosseder($id_praticien,$id_specialite){
        try {
            DB::table('posseder')->where('id_praticien',  $id_praticien)->where('id_specialite',$id_specialite)->delete();
        } catch (QueryException $e) {
            $erreur=$e->getMessage();
            if ($e->getCode()==="23000") {
                $erreur="Impossible de supprimer";
            }
            throw new MonException($erreur,5);
        }
    }
    public function getSpePraticienById($id_praticien,$id_specialite){
        try {
            $specialite = DB::table("posseder")
                ->select()
                ->where("id_praticien", "=", $id_praticien)
                ->where("id_specialite", "=", $id_specialite)
                ->get();
            return $specialite;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
}
