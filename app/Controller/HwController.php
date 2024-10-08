<?php

namespace App\Controller;
use App\Model\HW;
use Support\DataTables;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class HwController
{
    // Controller logic here
    protected $validator;
    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function hw()
    {
        $title = "Data HW";
        if(Request::isAjax()){
            $alat = HW::all();
            return DataTables::of($alat)->make(true);
        }
        View::render('hw/hw',['title'=>$title],'navbar/navbar');
    }
}
