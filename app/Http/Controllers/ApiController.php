<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MenuModel;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class ApiController extends Controller
{
	
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function menu()
    {
    	$tampil = MenuModel::orderBy('id_menu','desc')->get();
    	return response()->json($tampil,200);
    }
}
