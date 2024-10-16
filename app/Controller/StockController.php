<?php

namespace App\Controller;
use App\Model\Stock;
use Support\Date;
use Support\Request;
use Support\Response;
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
        if($stock){
            $stock->stock = $request->stock + $stock->stock;
            $stock->harga = $request->harga;
            $stock->factory = $request->factory;
            $stock->tgl_in_obat = $request->tgl_in_obat;
            $stock->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
            $stock->updated_by = Session::user()->username;
            $stock->updated_at = Date::now();
            $stock->save();
        } else {
            Stock::create([
                'id_obat' => $id,
                'stock' => $request->harga,
                'factory' => $request->factory,
                'tgl_in_obat' => $request->tgl_in_obat,
                'tgl_kadaluwarsa' => $request->tgl_kadaluwarsa,
                'created_by' => Session::user()->username,
                'created_at' => Date::Now()
            ]);
        }
        return Response::json(['status'=>200]);
    }
}
