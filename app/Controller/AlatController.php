<?php

namespace App\Controller;
use App\Model\Alat;
use Support\DataTables;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class AlatController
{
    // Controller logic here
    protected $validator;
    public function __construct()
    {
        $this->validator = new Validator();
    }
    public function alat()
    {
        $title = "Data Alat";
        if(Request::isAjax()){
            $alat = Alat::all();
            return DataTables::of($alat)->make(true);
        }
        View::render('alat/alat',['title'=>$title],'navbar/navbar');
    }
}
