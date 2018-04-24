<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function index(Product $product)
    {
        //
        $categories = Category::all();
        return view('product.prodcate',['categories'=>$categories,'product'=>$product]);
    }


    public function store(Request $request, Product $product)
    {
        //
        $categories = $request->categories;
        $data   = array();

        foreach ($categories as $value) {
            $checkCate = DB::table('category_product')->where([
                ['category_id','=',$value],
                ['product_id','=',$product->id]
            ]);
            //dd($checkCate->count());
            if($checkCate->count()==0){
                $data[] = [
                    'category_id' => $value,
                    'product_id' => $product->id,
                ];
            }
        }

        //dd($data);

        DB::table('category_product')->insert($data);

        return back()->with('success','Successfully added categories');
    }

    public function show(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product, Category $category)
    {
        //
        DB::table('category_product')
            ->where([
                ['category_id', '=', $category->id],
                ['product_id', '=', $product->id],
            ])->delete();
        return back();
    }
}
