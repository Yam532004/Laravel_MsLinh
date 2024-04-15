<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products = Products::all()->where('new', '=', 1);
        $allProducts = Products::all();


        //dd($products);
        return view('pages/index', compact('products', 'allProducts'));
    }
    public function getProductType($id)
    {
        $producttype = Products::find($id);
        return view('pages/product_type', compact('producttype'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        if (!is_null($oldCart)) {
            $cart = $oldCart;
        } else {
            $cart = new Cart();
        }
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        // dd($request);
        return redirect()->back();
    }
    public function contact()
    {
        return view('pages/contact');
    }
    public function about()
    {
        return view('pages/about');
    }

    public function delete(Request $request, $id)
    {
        $cart = session('cart') ? session('cart') : new Cart();
        $cart->removeItem($id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function showCart()
    {
        $cart = session('cart') ? session('cart') : new Cart();
        $products = $cart->getItems();
        // dd($products);
        return view('pages.checkout', ['products' => $products]);
    }

    public function updateSessionQuantity(Request $request)
    {
        $productId = $request->input('productId');
        $newQuantity = $request->input('quantity');

        // Tìm kiếm giá trị qty trong session
        $product = $request->session()->get('product');

        if ($product) {
            $filteredProduct = $product->filter(function ($item) use ($productId) {
                return $item['item']['id'] == $productId;
            })->first();

            if ($filteredProduct) {
                // Tìm thấy đối tượng trong session, tiến hành cập nhật qty
                $filteredProduct['qty'] = $newQuantity;
                $request->session()->put('product', $product);
                $request->session()->put('Qty', $newQuantity);
            }
        }

        return view('pages.shopping-cart', compact('newQuantity', 'product'));
    }
    public function getSignin()
    {
        return view('dangky');
    }
    public function postSignup(Request $req)
    {
        $req->validate(

            [

                'email' => 'required|email|unique:users,email',
                'full_name' => 'required',
                'password' => 'required|min:6|max:20',
                'address' => 'required',
                'phone' => 'required',
                'repassword' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử  dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'repassword.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự'
            ]
        );

        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('success', 'Tạo tài khoản thành công');
    }

    public function getLogin()
    {
        return view('login');
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
                'email.unique' => 'Email đã có người sử  dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự'
            ]
        );
        $credentials = ['email' => $req->email, 'password' => $req->password];
        if (Auth::attempt($credentials)) { //The attempt method will return true if authentication was successful. Otherwise, false will be returned.
            return redirect('/')->with(['flag' => 'alert', 'success' => 'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return 'Dang xuat thanh cong';
        return redirect('/')->with(['flag' => 'alert', 'success' => 'Đăng xuất thành công']);
    }
    //ham gui mail
    function sendEmail()
    {
        return view('emails/interfaceEmail');
    }

    //hàm xử lý gửi email
    public function postInputEmail(Request $req)
    {
        $email = $req->txtEmail;
        //validate

        // kiểm tra có user có email như vậy không
        $user = User::where('email', $email)->get();
        //dd($user);
        if ($user->count() != 0) {
            //gửi mật khẩu reset tới email
            $sentData = [
                'title' => 'Mật khẩu mới của bạn là:',
                'body' => '123456'
            ];

            // Mail::to('am.y25@student.passerellesnumeriques.org')->send(new \App\Mail\SendMail($sentData));
            Mail::to('am.y25@student.passerellesnumeriques.org')->send(new \App\Mail\SendMail($sentData));

            Session::flash('message', 'Send email successfully!');
            return redirect()->route('home');  //về lại trang đăng nhập của khách
        } else {
            return redirect()->route('getInputEmail')->with('message', 'Your email is not right');
        }
    } //hết <postInputEmail></postInputEmail>

}
