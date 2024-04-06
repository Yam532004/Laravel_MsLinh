<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
}
