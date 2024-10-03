<?php

namespace App\Controller;
use App\Model\Stock;
use Support\Request;
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
        pretty_print($stock);
    }
}
