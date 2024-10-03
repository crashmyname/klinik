<?php

namespace App\Controller;
use App\Model\Pemakaian;
use Support\DataTables;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class PemakaianController
{
    // Controller logic here
    protected $validator;
    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function index()
    {
        View::render('dashboard',[],'navbar/navbar');
    }

    public function pemakaian()
    {
        $title = 'Data Pemakaian Obat';
        if(Request::isAjax()){
            $pemakaian = Pemakaian::query()
            ->select('tb_pemakaian.id_pemakaian','tb_pemakaian.nik','tb_pemakaian.nama','tb_pemakaian.kode_section','tb_pemakaian.keluhan','tb_pemakaian.jenis_obat','tb_obat.id_obat','tb_obat.nama_obat','tb_pemakaian.jumlah','tb_pemakaian.tgl_pemakaian','tb_pemakaian.created_by','tb_pemakaian.created_at','tb_pemakaian.modify_by')
            ->leftJoin('tb_obat','tb_pemakaian.jenis_obat','=','tb_obat.id_obat')
            ->where('tb_pemakaian.deleted_at','=','')
            ->get();
            
            return DataTables::of($pemakaian)->make(true);
        }
        $count = Pemakaian::query()->count();
        View::render('pemakaian/pemakaian_obat',['title'=>$title,'count'=>$count],'navbar/navbar');
    }
}
