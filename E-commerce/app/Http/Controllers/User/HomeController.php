<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {

        return view("user.index");
    }
    public function favorites()
    {

        $favoriteProducts =  auth()->user()->favoriteProducts;
        return view("user.whislist", compact("favoriteProducts"));
    }
}
