<?php

namespace App\Controller;
use Support\Http;
use Support\Request;
use Support\Response;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class ApiController
{
    // Controller logic here
    public function DataApiNama(Request $request)
    {
        $nik = $request->nik;
        try{
            $api = Http::get('http://10.203.68.47:90/fambook/config/api2.php?nik='.$nik);
            $res = Response::json($api['response']);
            if($res !== null){
                return Response::json($api);
            }
        } catch (\Exception $e){
            return Response::json(['error' => $e->getMessage()], 500);
        }
    }

    public function DataApiSect(Request $request)
    {
        $nik = $request->nik;
        try{
            $api = Http::get('http://10.203.68.47:90/fambook/config/api2.php?nik='.$nik);
            $res = Response::json($api['response']);
            if($res !== null){
                return Response::json($api);
            }
        } catch (\Exception $e){
            return Response::json(['error'=>$e->getMessage()], 500);
        }
    }
}
