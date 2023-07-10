<?php

namespace App\Http\Controllers\controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    public function register(RegisterRequest $request, RegisterService $service)
    {
        $user = $service->register($request);
        return $this->returnData("User",$user);
    }
}
