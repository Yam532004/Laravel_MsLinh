<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    }
    public function create()
    {
    }
    public function store(Request $req)
    {
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function login()
    {
        return view('pages/login');
    }

    public function signUp()
    {
        $carts = Cart::all();

        return view('pages/sign-up', compact('carts'));
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự'
            ]
        );
        $credentials = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($credentials)) {
            return redirect('/admin/category/danhsach')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công voi ADMIN']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'thongbao' => 'Đăng nhập không thành công']);
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }
}
