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
        return View::render('dashboard',[],'navbar/navbar');
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
        $listobat = Obat::query()
                        ->select('id_obat','nama_obat','factory')
                        ->orderBy('nama_obat','asc')
                        ->orderBy('factory','asc')
                        ->get();
        return View::render('obat/obat',['title'=>$title,'listobat'=>$listobat],'navbar/navbar');
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
        } else {
            return Response::json(['status' => 500, 'message' => 'Failed to upload file.']);
        }
    }

    public function updateObat(Request $request,$id)
    {
        $obat = Obat::find($id);
        $obat->nama_obat = $request->nama_obat;
        $obat->keluhan = $request->keluhan;
        $obat->dosis = $request->dosis;
        if($request->jenis){
            $obat->jenis = $request->jenis;
        }
        if($request->factory){
            $obat->factory = $request->factory;
        }
        if($obat->foto){
            $path = storage_path('obat');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFilePath = $path . '/' . $obat->foto;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            $obat->foto = $request->getClientOriginalName('foto');
            $tempPath = $request->getPath('foto');
            $destination = $path . '/' . $obat->foto;
            move_uploaded_file($tempPath,$destination);
        }
        $obat->save();
        return View::redirectTo('/obat');
    }

    public function deleteObat($id)
    {
        $obat = Obat::find($id);
        $path = storage_path('obat');
        $filePath = $path . '/' . $obat->foto;
        if(file_exists($filePath)){
            unlink($filePath);
        }
        $obat->delete();
        return Response::json(['status'=>200,'message'=>'berhasil']);
    }
}

?>