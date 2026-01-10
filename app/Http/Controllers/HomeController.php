<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\ModelControllers\ProductController;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [productController()->fetchPage()]);
    }
}
