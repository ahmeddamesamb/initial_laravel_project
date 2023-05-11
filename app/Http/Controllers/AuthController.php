<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //connexion
    public function login(Request $request)
    {
        //validationn champs
        $field = $request->validate([
            "email" => 'required|string|email',
            "password" => 'required|string'
        ]);
        $user=User::where("email",$field["email"])->first();
        if(!$user || !Hash::check($field["password"],$user->password)){
            return response()->json(
                [
                    "message"=>"veiller verifier votre login et votre mot de passe"
                ],
                404
            );
        }

        $token = $user->createToken('user-token')->plainTextToken;
        return response()->json([
            "message"=> "Connecter avec succes",
            "token"=>$token,
            "user"=>$user
        ],200);

    }

    //deconnexion
    public function logout()
    {
        
        auth()->user()->tokens()->delete();
        return response()->json([
            "message"=>"log Out"
        ]);
    }
}
