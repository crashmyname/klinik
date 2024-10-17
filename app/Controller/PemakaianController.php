<?php

namespace App\Controller;
use App\Model\Obat;
use App\Model\Over;
use App\Model\Pemakaian;
use App\Model\Stock;
use Support\Database;
use Support\DataTables;
use Support\Date;
use Support\Http;
use Support\Request;
use Support\DB;
use Support\Response;
use Support\Session;
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

    // public function index()
    // {
    //     View::render('dashboard',[],'navbar/navbar');
    // }

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
        $api = Http::get('http://10.203.68.47:90/fambook/config/newapi.php?action=getSimpleEmp&api_key=P@55W0RD');
        $res = json_encode($api);
        if($api['status'] == 200){
            $res = $api['response'];
        } else {
            $res = [];
        }
        $count = Pemakaian::query()->count();
        $obat = Obat::query()->select('id_obat','nama_obat','factory')->get();
        View::render('pemakaian/pemakaian_obat',['title'=>$title,'count'=>$count,'res'=>$res,'obat'=>$obat],'navbar/navbar');
    }

    public function addPemakaian(Request $request)
    {
        $month = Date::parse($request->tgl_pemakaian)->format('m');
        $pemakaian = Pemakaian::query()
                                ->where('nik','=',$request->nik)
                                ->whereMonth('tgl_pemakaian',$month)
                                ->whereIn('jenis_obat',['36','93'])
                                ->get();
        $stock = Stock::query()
                        ->where('id_obat','=',$request->jns_obat)
                        ->first();
        if(($request->jns_obat=='36' || $request->jns_obat=='93') && $request->jumlah > 2){
            return Response::json(['status'=>203]);
        } else {

            switch (true) {
                case count($pemakaian) > 1 && ($request->jns_obat == '36' || $request->jns_obat == '93'):
                    Over::create([
                        'nik' => $request->nik,
                        'nama' => $request->nama,
                        'kode_section' => $request->section,
                        'keluhan' => $request->keluhan,
                        'jenis_obat' => $request->jns_obat,
                        'jumlah' => $request->jumlah,
                        'tgl_pemakaian' => $request->tgl_pemakaian,
                        'created_by' => Session::user()->username,
                        'created_at' => Date::now()
                    ]);
                    if($stock){
                        $stock->stock = $stock->stock - $request->jumlah;
                        $stock->save();
                    }
                    return Response::json(['status' => 202]);
                    break;
                case $stock->stock == '0':
                    return Response::json(['status'=>204]);
                    break;
                case $request->jumlah > $stock->stock:
                    return Response::json(['status'=>205]);
                    break;
                default:
                    Pemakaian::create([
                        'nik' => $request->nik,
                        'nama' => $request->nama,
                        'kode_section' => $request->section,
                        'keluhan' => $request->keluhan,
                        'jenis_obat' => $request->jns_obat,
                        'jumlah' => $request->jumlah,
                        'tgl_pemakaian' => $request->tgl_pemakaian,
                        'created_by' => Session::user()->username,
                        'created_at' => Date::now()
                    ]);
                    if($stock){
                        $stock->stock -= $request->jumlah;
                        $stock->save();
                    }
                    return Response::json(['status'=>200]);
                    break;
            }
        }
    }

    public function updatePemakaian(Request $request, $id)
    {
        $pemakaian = Pemakaian::find($id);
        $oldqty = $pemakaian->jumlah;
        $pemakaian->nik = $request->nik;
        $pemakaian->nama = $request->nama;
        $pemakaian->kode_section = $request->kode_section;
        $pemakaian->keluhan = $request->keluhan;
        $pemakaian->jenis_obat = $request->jenis_obat;
        $pemakaian->jumlah = $request->jumlah;
        $pemakaian->tgl_pemakaian = $request->tgl_pemakaian;
        $pemakaian->modify_by = Session::user()->username;
        $pemakaian->updated_at = Date::Now();
        DB::beginTransaction();
        try{
            $stock = Stock::query()
                            ->where('id_obat','=',$pemakaian->jenis_obat)
                            ->first();
                // $stock->updated(['stock' => $stock->stock + $oldqty]);
                $stock->stock += $oldqty;
                $stock->save();
                $pemakaian->save();
                $stock->updated(['stock' => $stock->stock - $request->jumlah]);
            DB::commit();
            Response::json(['status'=>200]);
        } catch(\Exception $e){
            DB::rollback();
            Response::json(['status'=>500,'message'=>$e->getMessage()]);
        }
    }

    public function deletePemakaian(Request $request, $id)
    {
        $pemakaian = Pemakaian::find($id);
        $pemakaian->deleted_at = Date::now();
        $pemakaian->deleted_by = Session::user()->username;
        $stock = Stock::query()
                        ->where('id_obat','=',$pemakaian->jenis_obat)
                        ->first();
        $stock->stock += $pemakaian->jumlah;
        $stock->save();    
        $pemakaian->save();
        return Response::json(['status'=>200]);
    }

    public function over(Request $request)
    {
        $title = 'Data Pemakaian Lebih';
        if(Request::isAjax()){
            $pemakaian = Over::query()
            ->select('tb_offer.id_offer','tb_offer.nik','tb_offer.nama','tb_offer.kode_section','tb_offer.keluhan','tb_offer.jenis_obat','tb_obat.id_obat','tb_obat.nama_obat','tb_offer.jumlah','tb_offer.tgl_pemakaian','tb_offer.created_by','tb_offer.created_at','tb_offer.updated_by')
            ->leftJoin('tb_obat','tb_offer.jenis_obat','=','tb_obat.id_obat')
            ->where('tb_offer.deleted_at','=','')
            ->get();
            // $pemakaian = Over::all();
            
            return DataTables::of($pemakaian)->make(true);
        }
        $api = Http::get('http://10.203.68.47:90/fambook/config/newapi.php?action=getSimpleEmp&api_key=P@55W0RD');
        $res = json_encode($api);
        if($api['status'] == 200){
            $res = $api['response'];
        } else {
            $res = [];
        }
        $count = Pemakaian::query()->count();
        $obat = Obat::query()->select('id_obat','nama_obat','factory')->get();
        View::render('excess/excess',['title'=>$title,'count'=>$count,'res'=>$res,'obat'=>$obat],'navbar/navbar');
    }

    public function deleteOver(Request $request, $id)
    {
        $over = Over::find($id);
        $over->deleted_at = Date::Now();
        $over->deleted_by = Session::user()->username;
        $over->save();
        return Response::json(['status'=>200]);
    }
}
