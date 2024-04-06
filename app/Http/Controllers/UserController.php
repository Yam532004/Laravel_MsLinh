<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Cart;

class UserController extends Controller
{
    public function index()
    {
    }

    public function login()
    {
        return view('pages/login');
    }

    public function signUp()
    {
        $carts = Cart::all();

        return view('pages/sign-up',compact('carts')); 
    }
}