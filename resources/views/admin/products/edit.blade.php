@extends('admin.layouts.app')
@section('page_title','Edit produc')

@section('content')

    <div class="card">
        @include('admin.layouts.notification')
        <div class="card-body">
            <form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status" class="col-form-label">Select Category <span class="text-danger">*</span></label>
                    <select name="cate_id" class="form-control">
                        <option value="">Select category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($product->cate_id == $category->id)? 'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputName" class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input id="inputName" type="text" name="name" placeholder="Enter name"  value="{{$product->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="slug" class="col-form-label">Slug <span class="text-danger">*</span></label>
                    <input id="slug" type="text" name="slug" placeholder="Enter name"  value="{{ $product->slug }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" id="summernote" name="description">{!! $product->description !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="originalPrice" class="col-form-label">Original price <span class="text-danger">*</span></label>
                    <input id="originalPrice" type="text" name="original_price" placeholder="Enter original price"  value="{{ $product->original_price }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="sellingPrice" class="col-form-label">Selling price <span class="text-danger">*</span></label>
                    <input id="sellingPrice" type="text" name="selling_price" placeholder="Enter selling price"  value="{{ $product->selling_price }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" onchange="previewImage(this)">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <div class="col-md-12 mb-2" id="preview-image"><img src="{{asset('uploads/products/'.$product->image)}}"></div>
                </div>

                <div class="form-group">
                    <label for="status">Status</label><br>
                    <input type="checkbox" name='status' id='status' value='1' {{ $product->status == 1 ? 'checked' : '' }} > Yes
                </div>

                <div class="form-group">
                    <label for="trending">Trending</label><br>
                    <input type="checkbox" name='trending' id='trending' value='1' {{ $product->status == 1 ? 'trending' : '' }}> Yes
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qty" class="col-form-label">Qty</label>
                            <input id="qty" type="number" name="qty" placeholder="Enter qty"  value="{{$product->qty}}" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tax" class="col-form-label">Tax</label>
                            <input id="tax" type="number" name="tax" placeholder="Enter tax"  value="{{$product->tax}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="meta_title" class="col-form-label">Meta title</label>
                    <input id="meta_title" type="text" name="meta_title" placeholder="Enter meta title"  value="{{old('meta_title', $product->meta_title)}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="meta_desc" class="col-form-label">Meta title</label>
                    <input id="meta_desc" type="text" name="meta_desc" placeholder="Enter meta desc"  value="{{old('meta_desc', $product->meta_desc)}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="meta_keywords" class="col-form-label">Meta keywords</label>
                    <input id="meta_keywords" type="text" name="meta_keywords" placeholder="Enter meta key"  value="{{old('meta_keywords', $product->meta_keywords)}}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <a href="{{route('products.index')}}" type="reset" class="btn btn-warning">Back</a>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
