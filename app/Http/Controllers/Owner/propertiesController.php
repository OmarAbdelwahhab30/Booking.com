<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class propertiesController extends Controller
{
    public function index()
    {
        $this->authorize("properties-manage");
        $this->returnSuccessMessage("success");
    }
}
