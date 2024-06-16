<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view("user.index", compact("sliders", "categories", "brands"));
    }
}
