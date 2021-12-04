<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'status'=>'boolean',
            'popular'=>'boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'parent_id'=>'nullable|exists:categories,id',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $slug = Str::slug($request->name);
        $count=Category::where('slug',$slug)->count();
        if($count > 0){
            $slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = !empty($request->status) ? 1 : 0;
        $category->popular = !empty($request->popular) ? 1 : 0;
        if ($request->has('image')) {
            $filename_image = Helper::FileUpload($request->image, 'category');
            $category->image = $filename_image;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_desc = $request->meta_desc;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect()->route('categories.index')->withSuccess('Category has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'status'=>'boolean',
            'popular'=>'boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'parent_id'=>'nullable|exists:categories,id',
        ]);


        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $slug = Str::slug($request->name);
        $count=Category::where('slug',$slug)->count();
        if($count > 0){
            $slug = $slug.'-'.time();
        }
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = !empty($request->status) ? 1 : 0;
        $category->popular = !empty($request->popular) ? 1 : 0;

        if ($request->hasFile('image')) {
            \Storage::delete('uploads/category/' . $category->image);
            $filename_image = Helper::FileUpload($request->image, 'category');
            $category->image = $filename_image;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_desc = $request->meta_desc;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect()->route('categories.index')->withSuccess('Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        \Storage::delete('uploads/category/' . $category->image);
        $category->delete();
        return redirect()->back()->withSuccess('Category has been deleted!');
    }
}
