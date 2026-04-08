<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword(Request $request){
        $user=User::find($request->id);
        $user->update(['nama'=>$request->nama,'email'=>$request->email, 'password'=>Hash::make($request->password)]);
         return response()->json('Password di update!');
    }
}
