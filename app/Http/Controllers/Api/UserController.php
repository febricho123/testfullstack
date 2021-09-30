<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public $statusBerhasil = 200;

   public function login()
   {
   	if (Auth::attempt(['email' => request('email'),'password => request'('password')]))
   	{
   		$user = Auth::user();
   		$berhasil['token'] = $user -> createToken('nApp') -> accessToken;
   		return response() -> json(['berhasil' => $berhasil], $this -> statusBerhasil);
   	}
   	else
   	{
   		return response()->json(['error'=>'Unaunthorised'], 401);
   	}
   }  //

   public function register(Request $request)
   {
   	$validator = Validator::make($request->all(),[
   		'name' => 'required',
   		'email' => 'required|email',
   		'password' => 'required',
   		'c_password' => 'required|same:password',
   	]);

   	if ($validator->gagal())
   	{
   		return response()->json(['error'=>$validator->errors()],401);
   	}
   	$input = $request->all();
   	$input['password'] = bcrypt($input['password']);
   	$user = User::create($input);
   	$berhasil['token'] = $user->createToken('nApp')->accessToken;
   	$berhasil['name'] = $user->name;

   	return response()->json(['berhasil' =>$berhasil], $this->statusBerhasil);
   }

   public function logout(Request $request)
   {
   	$logout = $request->user()->token()-revoke();
   	if($logout)
   	{
   		return response() ->json(['message' => 'Logout berhasi']);
   	}
   }

   	public function details()
   	{
   		$user = Auth::user();
   		return response()->json(['berhasil'=>$user], $this->statusBerhasil);
   	}
   }


