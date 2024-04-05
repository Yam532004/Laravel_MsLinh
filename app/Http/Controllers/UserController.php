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
        return view('login');
    }

    public function signUp()
    {
        $carts = Cart::all();

        return view('sign-up',compact('carts')); 
    }
}