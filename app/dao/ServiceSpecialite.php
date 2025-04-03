<?php

namespace App\dao;

use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\DB;


class ServiceSpecialite
{

    public function getSpecialitesByPracticien($idPracticien)
    {
        try {
            $lesSpecialites = DB::table("posseder")
                ->select()
                ->join("specialite", "specialite.id_specialite", "=", "posseder.id_specialite")
                ->where("posseder.id_praticien", "=", $idPracticien)
                ->get();
            return $lesSpecialites;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
}
