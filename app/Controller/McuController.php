<?php

namespace App\Controller;
use App\Model\Mcu;
use Support\DataTables;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class McuController
{
    // Controller logic here
    public function mcu(){
        $title = 'Data MCU';
        if(Request::isAjax()){
            // $mcu = Mcu::all();
            $mcu = Mcu::query()
                    ->select('id_mcu','nik','no_rm','nama','factory','tgl_pemeriksaan','status_gizi','buta_warna','anamnesa','radiology_test','dokter','fitness_s','keterangan')
                    ->get();
            return DataTables::of($mcu)
                    ->make(true);
        }
        View::render('mcu/mcu',['title'=>$title],'navbar/navbar');
    }
}
