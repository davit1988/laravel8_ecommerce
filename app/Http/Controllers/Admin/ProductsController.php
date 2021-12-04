<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
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
            'cate_id' => 'required',
            'name'=>'required',
            'description'=>'required',
            'original_price'=>'required',
            'selling_price'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty'=>'required',
            'tax'=>'required',
            'status'=>'required',
            'trending'=>'required',
            'meta_title'=>'required',
            'meta_desc'=>'required',
            'meta_keywords'=>'required',
            //'parent_id'=>'nullable|exists:categories,id',
        ]);
        $data = $request->all();

        $slug = Str::slug($request->name);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.time();
        }
        $data['slug'] = $slug;
        $data['image'] = Helper::FileUpload($request->image, 'products');
        Product::create($data);

        return redirect()->route('products.index')->withSuccess('Product has been created');
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
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit',compact('categories','product'));
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
            'cate_id' => 'required',
            'name'=>'required',
            'description'=>'required',
            'original_price'=>'required',
            'selling_price'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty'=>'required',
            'tax'=>'required',
            'meta_title'=>'required',
            'meta_desc'=>'required',
            'meta_keywords'=>'required',
            //'parent_id'=>'nullable|exists:categories,id',
        ]);
        $product = Product::find($id);
        $data = $request->all();

        $slug = Str::slug($request->name);
        $count = Product::where('slug',$slug)->count();
        if($count>0){
            $slug = $slug.'-'.time();
        }
        $data['slug'] = $slug;
        if ($request->hasFile('image')) {
            \Storage::delete('uploads/products/' . $product->image);
            $data['image'] = Helper::FileUpload($request->image, 'products');
        }

        $product->fill($data)->save();

        return redirect()->route('products.index')->withSuccess('Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        \Storage::delete('uploads/products/' . $product->image);
        $product->delete();
        return redirect()->back()->withSuccess('Product has been deleted!');
    }
}
