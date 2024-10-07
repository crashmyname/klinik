<?php

namespace App\Controller;
use App\Model\Stock;
use Support\Date;
use Support\Request;
use Support\Session;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class StockController
{
    // Controller logic here
    public function addStock(Request $request)
    {
        $id = $request->id_obat;
        $stock = Stock::query()
                        ->where('id_obat','=',$id)
                        ->first();
        $stock->stock = $request->stock + $stock->stock;
        $stock->harga = $request->harga;
        $stock->factory = $request->factory;
        $stock->tgl_in_obat = $request->tgl_in_obat;
        $stock->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
        $stock->updated_by = Session::user()->username;
        $stock->updated_at = Date::now();
        $stock->save();
    }
}
