<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $listsp = Product::get();
        return view('backend.product.index',compact('listsp'));
    }
}
