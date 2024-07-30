<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request){
        User::create(['name' => $request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        return response()->json(['message' => 'User Created Successfully'],200);
    }

    public function changePassword(ChangePasswordRequest $changePasswordRequest){

        User::where(['email'=>$changePasswordRequest->email])->update(['password'=>Hash::make($changePasswordRequest->password)]);
        return response()->json(['message' => 'User Password updated Successfully'],200);

    }
}
