<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public $cart;
    //thêm 1 sản phẩm có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
    // public function addToCart(Request $request, $id)
    // {
    //     $product = Products::find($id);
    //     $oldCart = $request->session()->has('cart') ? request()->session()->get('cart') : null;
    //     $cart = new Cart();
    //     $cart = $oldCart;
    //     if ($cart){
    //         $cart->add($product, $id);
    //     }
    //     $request->session()->put('cart', $cart);
    //     return redirect()->back();
    // }
}
