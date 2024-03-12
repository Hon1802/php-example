<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.login',[
            "title" =>"Login",
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this ->validate($request, [
            'email' => 'required|email:filter',
            'password'=> 'required'
        ]); 
        if(Auth::attempt([
            'email'=> $request -> input('email'),
            'password'=> $request -> input('password')
        ], $request->input('remember'))){
            return route('admin');
        }
    }

}
