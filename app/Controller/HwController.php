<?php

namespace App\Controller;
use App\Model\HW;
use Support\DataTables;
use Support\Date;
use Support\Http;
use Support\Request;
use Support\Response;
use Support\Session;
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
            $hw = HW::all();
            return DataTables::of($hw)->make(true);
        }
        $api = Http::get('http://10.203.68.47:90/fambook/config/newapi.php?action=getJkP&api_key=P@55W0RD');
        $res = json_encode($api['response']);
        if ($api['status'] == 200) {
            $res = $api['response'];
        } else {
            $res = [];
        }
        View::render('hw/hw',['title'=>$title,'res'=>$res],'navbar/navbar');
    }

    public function AddHw(Request $request)
    {
        $hw = HW::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'section' => $request->section,
            'tanggal' => $request->tanggal,
            'created_by' => Session::user()->username,
            'created_at' => Date::now()
        ]);
        return Response::json(['status' => 200]);
    }

    public function UpdateHw(Request $request, $id)
    {
        $hw = HW::find($id);
        $hw->nik = $request->nik;
        $hw->nama = $request->nama;
        $hw->section = $request->section;
        $hw->tanggal = $request->tanggal;
        $hw->updated_by = Session::user()->username;
        $hw->updated_at = Date::now();
        $hw->save();
        return Response::json(['status'=>200]);
    }

    public function deleteHw(Request $request, $id)
    {
        $hw = HW::find($id);
        $hw->delete();
        return Response::json(['status'=>200]);
    }

}
