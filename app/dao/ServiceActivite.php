<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\DB;


class ServiceActivite
{

    public function getActivitesByPracticien($idPracticien)
    {
        try {
            $lesActivites = DB::table("activite_compl")
                ->select()
                ->join("inviter", "activite_compl.id_activite_compl", "=", "inviter.id_activite_compl")
                ->where("inviter.id_praticien", "=", $idPracticien)
                ->get();
            return $lesActivites;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getActivite( )
    {
        try {
            $lesactivites = DB::table('activite_compl')
                ->select()
                ->orderBy('id_activite_compl', 'asc')
                ->get();
            return $lesactivites;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function getActiviteById($id_Activite)
    {
        try {
            $Activite = DB::table("activite_compl")
                ->select()
                ->where("id_activite_compl", "=", $id_Activite)
                ->get();
            return $Activite;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
}
