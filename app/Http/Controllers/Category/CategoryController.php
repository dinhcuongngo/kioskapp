<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        //
        $categories = Category::all();

        return view('category.categories',['categories'=>$categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules  = [
            'name' => 'required',
            'description' => 'required',
        ];

        $msg    = [
            'name.required' => 'The category name is not empty.',
            'description.required' => 'The description field is not empty.',
        ];

        $this->validate($request, $rules, $msg);

        $category = $request->all();
        Category::create($category);

        return back()->with(['success'=>'Successfully created a new category!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $data = Category::findOrFail($category);

        //dd($data);

        return view('category.edit',['category'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->only([
            'name',
            'description'
        ]));

        $category->save();

        return  back()->with('success','Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return back();
    }
}
