<?php

namespace App\dao;

use App\Models\Frais;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
class ServiceFrais
{
    public function getFrais($id_visiteur )
    {
        try {
            $lesFrais = DB::table('frais')
                ->select()
                ->where('id_visiteur', '=', $id_visiteur)
                ->orderBy('anneemois', 'desc')
                ->get();
            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function getByid($id_frais)
    {
        try {
            $unFrais = DB::table('frais')
                ->select()
                ->where('id_frais', '=', $id_frais)
                ->first();
            return $unFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function updateFrais($id_frais,$anneemois,$nbjustificatif){
        try {
            $unFrais = DB::table('frais')
                ->where('id_frais', '=', $id_frais)
                ->update(['anneemois'=>$anneemois,'nbjustificatifs'=>$nbjustificatif]);

        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function inserFrais($id_visiteur,$anneemois,$nbjustificatif)
    {
        try {
            $aujourdhui = date("Y-m-d");
            DB::table('frais')
                ->insert(['datemodification'=>$aujourdhui,
                    'id_etat'=>2,
                    'id_visiteur'=>$id_visiteur,
                    'anneemois'=>$anneemois,
                    'nbjustificatifs'=>$nbjustificatif]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function deleteFrais($id_frais){
        try {
            DB::table('frais')->where('id_frais',  $id_frais)->delete();
        } catch (QueryException $e) {
            $erreur=$e->getMessage();
            if ($e->getCode()==="23000") {
                $erreur="Impossible de supprimer une fiche ayant des frais liés";
            }
            throw new MonException($erreur,5);
        }
    }
}
