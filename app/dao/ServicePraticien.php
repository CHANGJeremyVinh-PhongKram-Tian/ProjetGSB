<?php

namespace App\dao;

use App\Models\Praticien;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
class ServicePraticien
{
    public function getPraticien( )
    {
        try {
            $lesPraticien = DB::table('praticien')
                ->select()
                ->orderBy('nom_praticien', 'asc')
                ->get();
            return $lesPraticien;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function getPraticienByid($id_praticien)
    {
        try {
            $unPraticien = DB::table('praticien')
                ->select()
                ->where('id_praticien', '=', $id_praticien)
                ->get();
            return $unPraticien;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function recherche($nom,$prenom,$ville,$specialite,$libre,$type){
        try {
            $recherche = DB::table('praticien')
                ->join('posseder','posseder.id_praticien','=','praticien.id_praticien')
                ->leftJoin('specialite','posseder.id_specialite','=','specialite.id_specialite')
                ->leftJoin('type_praticien','praticien.id_type_praticien','=','type_praticien.id_type_praticien')
                ->select()
                ->where('nom_praticien','=',$nom)
                ->orWhere('prenom_praticien','=',$prenom)
                ->orWhere('ville_praticien','=',$ville)
                ->orWhere('posseder.id_specialite','=',$specialite)
                ->orWhere('nom_praticien','like','%'.$libre.'%')
                ->orWhere('praticien.id_type_praticien','=',$type)
                ->get();

            return $recherche;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function getTypes(){
        try {
            $types = DB::table('type_praticien')
                ->select()
                ->get();
            return $types;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
}
