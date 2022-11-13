<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard.index');
    }
}
// <?php

// namespace App\Http\Controllers\backend;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Category;

// class CategoryController extends Controller
// {
//     public function index(){
//         $list = Category::where('status','!=',0)->orderby('created_at','desc')->get();
//         return view('backend.category.index',compact('list'));
//     }
//     public function create()
//     {
//         echo "manh rr";
//     }
//     public function update()
//     {
//         echo "manh rr";
//     }
//     public function delete()
//     {
//         echo "manh rr";
//     }
//     public function status($id)
//     {
//         $category = Category::find($id);
//         if($category == null){

//         }
//         else{
//             $category->status = ($category->status == 1) ? 2 : 1;
//             $category -> update_at = date('Y-m-d H:i:s');
//             $category ->update_by = 1;
//             $category ->save();
//             return redirect()->route('category.index');
//         }
//     }
// }
