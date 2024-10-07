<?php

namespace App\Controller;
use App\Model\Alat;
use App\Model\Mcu;
use App\Model\Obat;
use App\Model\Pemakaian;
use App\Model\RestEmp;
use App\Model\User;
use Support\Auth;
use Support\Date;
use Support\Request;
use Support\Session;
use Support\Validator;
use Support\View;
use Support\CSRFToken;

class HomeController
{
    // Controller logic here
    protected $validator;
    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function index()
    {
        $obat = Obat::query()->count();
        $user = User::query()->count();
        $pemakaian = Pemakaian::query()
                    ->whereMonth('tb_pemakaian.tgl_pemakaian',Date::Month())
                    ->whereYear('tb_pemakaian.tgl_pemakaian',Date::Year())
                    ->count();
        $rest = RestEmp::query()
                    ->whereMonth('tb_rest_emp.tgl_rest',Date::Month())
                    ->whereYear('tb_rest_emp.tgl_rest',Date::Year())
                    ->count();
        $mcu = Mcu::query()->count();
        $alat = Alat::query()->count();
        View::render('dashboard',['obat'=>$obat,'user'=>$user,'pemakaian'=>$pemakaian,'rest'=>$rest,'mcu'=>$mcu,'alat'=>$alat],'navbar/navbar');
    }

    public function onLogin(Request $request)
    {
        $user = User::query()
                ->where('username','=',$request->username)
                ->where('password','=',md5($request->password))
                ->first();
        if($user){
            Session::set('user',[
                'id_user' => $user->id_user,
                'username' => $user->username,
                'nama_user' => $user->nama_user,
                'level' => $user->level,
                'foto' => $user->foto
            ]);
            View::redirectTo('/home');
        } else {
            Session::set('error', 'Invalid Credentials');
            View::redirectTo('/login');
        }
    }

    public function logout()
    {
        Session::destroy();
        View::redirectTo('/login');
    }
}
