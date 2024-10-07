<?php

namespace App\Controller;
use Support\DataTables;
use Support\Date;
use Support\Response;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;
use App\Model\User;

class UserController
{
    protected $validator;
    public function __construct()
    {
        $this->validator = new Validator();
    }
    public function index(Request $request)
    {
        if(Request::isAjax()){
            $users = User::all();
            return DataTables::of($users)->make(true);
        }
        View::render('user/user',[],'navbar/navbar');
    }

    public function addUser(Request $request)
    {
        $path = storage_path('user');
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        $realname = $request->getClientOriginalName('foto');
        $tempPath = $request->getPath('foto');
        $destination = $path . '/' . $realname;
        if(move_uploaded_file($tempPath,$destination)){
            User::create([
                'nama_user' => $request->nama_user,
                'username' => $request->username,
                'password' => md5($request->password),
                'level' => $request->level,
                'foto' => $request->getClientOriginalName('foto')
            ]);
            return Response::json(['status'=> 200]);
        } else {
            return Response::json(['status'=>500]);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        if($request->password == ''){
            $user->password;
        } else {
            $user->password = md5($request->password);
        }
        $user->level = $request->level;
        if($user->foto){
            $path = storage_path('user');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path . '/' . $user->foto;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $user->foto = $request->getClientOriginalName('foto');
            $tempPath = $request->getPath('foto');
            $destination = $path . '/' . $user->foto;
            move_uploaded_file($tempPath,$destination);
        }
        $user->updated_at = Date::now();
        $user->save();
        return Response::json(['status'=>200,'message'=>'success']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        // pretty_print($user);
        $path = storage_path('user');
        $oldFile = $path . '/' . $user->foto;
        if(file_exists($oldFile)){
            unlink($oldFile);
        }
        $user->delete();
        return Response::json(['status'=>200,'message'=>'deleted']);
    }
}
