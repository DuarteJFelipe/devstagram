<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function __construct()
    {
        //revisa y proteje que el usuario este autenticado
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('dashboard',[
            'user' => $user
        ]);
    }
}
