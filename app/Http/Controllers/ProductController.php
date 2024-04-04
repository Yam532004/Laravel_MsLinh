<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function home()
    {
        return view('home');
    }
    public function index()
    {
        //
        $products = Product::where('new', 1)->get();
        $productAll = Product::all();
        return view('product', ['products' => $products, "productAll" => $productAll]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // Xử lý logic để hiển thị chi tiết sản phẩm có ID là $id
        $product = Product::findOrFail($id);
        return view('show', ['product' => $product]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getProductType($id)
    {
        $producttype = ProductType::find($id);
        $productByTypes = Product::all()
            ->where('id_type', '=', $id);
        return view('product-type', compact('productByTypes'));
    }

   
}
