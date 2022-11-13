<?php

// namespace App\Http\Controllers\backend;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     public function index(){
//         return view('backend.login.index');
//     }
//     public function store(Request $request){


//         $this->validate($request,[
//             'email' => 'required|email:filter',
//             'password' => 'required'
//         ]);

        
//         if(Auth::attempt([
//             'email' => $request->input('email'),
//             'password' => $request->input('password')
//         ], $request->input('remember')))
//         {
//             return redirect()->route('category.index');
//         }
//         return redirect()-> back();

//     }

// }
