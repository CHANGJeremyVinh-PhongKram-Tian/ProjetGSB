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
                ->first();
            return $lesFrais;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
}
