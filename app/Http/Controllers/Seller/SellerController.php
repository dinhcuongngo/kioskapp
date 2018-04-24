<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{

    public function index(Seller $seller)
    {
        //
        $sellers = Seller::has('products')->get();
        
        //dd($sellers);
        return view('user.sellers',['sellers'=>$sellers]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Seller $seller)
    {
        //
    }

    public function update(Request $request, Seller $seller)
    {
        //
    }

    public function destroy(Seller $seller)
    {
        //
    }

    public function viewSellerProduct(Seller $seller)
    {
        $products = $seller->products;

        return view('user.products',['products'=>$products]);
    }
}
