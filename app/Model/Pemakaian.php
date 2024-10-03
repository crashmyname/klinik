<?php

namespace App\Model;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Support\BaseModel;
use Support\Request;

class Pemakaian extends BaseModel
{
    // Model logic here
    public $table = 'tb_pemakaian';
    protected $primaryKey = 'id_pemakaian';

    public function importFromFile(Request $request, $filepath)
    {
        $spreadsheet = IOFactory::load($filepath);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();
        $headers = array_shift($data);
        foreach($data as $row){
            $dataArray = array_combine($headers,$row);
            $this->attributes = $dataArray;
            $this->save();
        }
    }
}
