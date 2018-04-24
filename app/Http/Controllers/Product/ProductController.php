<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(Product $products)
    {
        //
        $seller_id  = Auth::user()->id;
        $user_role  = Auth::user()->admin;
        //dd($user_role);
        if($user_role == 'true'){
            $products = Product::all();
        } 
        else
        {
            $products   = Product::where('seller_id', $seller_id)->get();
        }
        

        //dd($products);
        return view('product.products',['products'=>$products]);
    }

    public function store(Request $request)
    {
        //
        $rules  = [
            'name' => 'required',
            'description' => 'required',
        ];

        $msg    = [
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
        ];

        $this->validate($request, $rules, $msg);

        $data = $request->all();
        $data['seller_id'] = Auth::user()->id;

        Product::create($data);

        return redirect('products')->with('success','Successfully added new product');

    }

    public function show(Product $product)
    {
        // $categories = DB::table('categories')
        //     ->join('category_product', 'category_product.category_id', '=', 'categories.id')
        //     ->join('category_product', 'category_product.product_id', '=', $product->id)
        //     ->select('categories.*', 'category_product.product_id')
        //     ->get();
        $id = $product->id;
        $categories = DB::table('categories')
            ->join('category_product', function ($join) use ($id) {
                $join->on('category_product.category_id', '=', 'categories.id')
                     ->where('category_product.product_id', '=', $id)
                     ->select('categories.*', 'category_product.product_id');
            })
            ->get();

        //dd($categories);

        return view('product.edit',['product'=>$product, 'categories'=>$categories]);
    }

    public function update(Request $request, Product $product)
    {
        //
        $rules  = [
            'name' => 'required',
            'description' => 'required',
        ];
        $msg    = [
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
        ];

        $this->validate($request,$rules,$msg);

        if($request->has('name'))
        {
            $product->name = $request->name;
        }

        if($request->has('description'))
        {
            $product->description = $request->description;
        }

        if($product->isClean())
        {
            return back()->withErrors(['fails'=>'You need to specify values for update.']);
        }

        $product->save();

        return back()->with('success','Successfully updated!');
    }

    public function destroy(Product $product)
    {
        //
    }
}
