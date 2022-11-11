<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function __construct()
    {
        //revisa y proteje que el usuario este autenticado
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }
}
