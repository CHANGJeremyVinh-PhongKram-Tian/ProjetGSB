<?php

namespace App\dao;

use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ServiceFraishorsforfait
{
    public function getFraishorsforfait($id_visiteur )
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
}
