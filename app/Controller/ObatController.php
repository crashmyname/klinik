<?php

namespace App\Controller;
use App\Model\Obat;
use Support\DataTables;
use Support\Request;
use Support\Response;
use Support\Session;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class ObatController
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

    public function obat()
    {
        $title = 'Data Obat';
        if(Request::isAjax()){
            $obat = Obat::query()
            ->select('tb_obat.id_obat','tb_obat.nama_obat','tb_obat.keluhan','tb_stock.stock','tb_obat.jenis','tb_obat.dosis','tb_obat.factory','tb_obat.foto')
            ->leftJoin('tb_stock','tb_stock.id_obat','=','tb_obat.id_obat')
            ->get();
            return DataTables::of($obat)->make(true);
        }
        View::render('obat/obat',['title'=>$title],'navbar/navbar');
    }

    public function addObat(Request $request)
    {
        $path = storage_path('obat');
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $originalname = $request->getClientOriginalName('foto');
        $tempPath = $request->getPath('foto');
        $destination = $path . '/' . $originalname;
        if(move_uploaded_file($tempPath, $destination)){
            Obat::create([
                'nama_obat' => $request->nama_obat,
                'jenis' => $request->jenis,
                'keluhan' => $request->keluhan,
                'dosis' => $request->dosis,
                'factory' => $request->factory,
                'foto' => $request->getClientOriginalName('foto'),
                'created_by' => Session::user()->nama_user,
                'modify_by' => Session::user()->nama_user,
            ]);
            return Response::json(['status'=>200,'message'=>'Berhasil']);
            // return Response::success('Obat berhasil ditambahkan.');
        } else {
            return response()->json(['status' => 500, 'message' => 'Failed to upload file.']);
        }
    }

    public function updateObat(Request $request,$id)
    {
        $obat = Obat::find($id);
        $obat->nama_obat = $request->nama_obat;
        $obat->save();
        View::redirectTo('/obat');
    }

    public function deleteObat($id)
    {
        $obat = Obat::find($id);
        $obat->delete();
        View::redirectTo('/obat');
    }
}

?>