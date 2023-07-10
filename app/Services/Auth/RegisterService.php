<?php

namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterService
{

    public function register($request):User
    {
        return $this->CreateToken(
            User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'role_id'       => $request->role_id
            ])
        );
    }


    public function CreateToken(User $user):User
    {
        $user->token = $user->createToken("User Token")->plainTextToken;
        return $user;
    }

}
