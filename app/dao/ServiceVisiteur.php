<?php

namespace App\dao;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;
class ServiceVisiteur
{
    public function login($login, $pwd){
        $connected = false;
        try {
            $visiteur = DB::table("visiteur")
                ->select()
                ->where("login_visiteur", '=', $login)
                ->first();
            if ($visiteur) {
                if ($visiteur->pwd_visiteur == $pwd) {
                    Session::put('id', $visiteur->id_visiteur);
                    Session::put('type', $visiteur->type_visiteur);
                    Session::put('login', $login);
                    $connected = true;
                }
            }
        }catch (QueryException $e){
            throw new MonException($e->getMessage(),5);
        }
        return $connected;
    }
    public function logout(){
        Session::put('id',0);
    }

    public function insertFrais($id_visiteur,$anneemois , $nbjustificatifs)
    {
        try {
            $aujourdhui = date("Y-m-d");
            DB::table("frais")
                ->insert(['datamodification'=>$aujourdhui,
                    'id_etat'=>2,
                    'id_visiteur'=>$id_visiteur,
                    'anneemois'=>$anneemois,
                    'nbjustificatifs'=>$nbjustificatifs]);
        } catch (QueryException $e){
            throw new MonException($e->getMessage());
        }
    }
}
