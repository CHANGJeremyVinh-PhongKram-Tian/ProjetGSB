<?php


namespace App\dao;

use App\Models\Praticien;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
class ServiceInviter
{
    public function updateInviter($id_activite,$id_Praticien,$specialiste): void
    {
        try {
            $Inviter = DB::table('inviter')
                ->where('id_activite_compl', '=', $id_activite)
                ->where('id_praticien', '=', $id_Praticien)
                ->update(['specialiste'=>$specialiste]);

        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function insertInviter($id_praticien,$id_activite,$specialiste): void
    {
        try {
            DB::table('inviter')
                ->insert(['id_praticien'=>$id_praticien,
                    'id_activite_compl'=>$id_activite,
                    'specialiste' =>$specialiste
                ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function deleteInviter($id_praticien,$id_activite){
        try {
            DB::table('inviter')->where('id_praticien',  $id_praticien)->where('id_activite_compl',$id_activite)->delete();
        } catch (QueryException $e) {
            $erreur=$e->getMessage();
            if ($e->getCode()==="23000") {
                $erreur="Impossible de supprimer";
            }
            throw new MonException($erreur,5);
        }
    }
    public function getActPraticienById($id_praticien,$id_specialite){
        try {
            $specialite = DB::table("inviter")
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
