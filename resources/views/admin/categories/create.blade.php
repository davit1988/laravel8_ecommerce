@extends('admin.layouts.app')
@section('page_title','Add category')

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputName" class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input id="inputName" type="text" name="name" placeholder="Enter name"  value="{{old('name')}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" id="summernote" name="description">{{old('description')}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="popular">Popular</label><br>
                    <input type="checkbox" name='popular' id='popular' value='1' checked> Yes
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" onchange="previewImage(this)">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    @error('image')
                     <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="col-md-12 mb-2" id="preview-image"></div>
                </div>

                <div class="form-group">
                    <label for="meta_title" class="col-form-label">Meta title</label>
                    <input id="meta_title" type="text" name="meta_title" placeholder="Enter meta title"  value="{{old('meta_title')}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="meta_desc" class="col-form-label">Meta title</label>
                    <input id="meta_desc" type="text" name="meta_desc" placeholder="Enter meta desc"  value="{{old('meta_desc')}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="meta_keywords" class="col-form-label">Meta keywords</label>
                    <input id="meta_keywords" type="text" name="meta_keywords" placeholder="Enter meta key"  value="{{old('meta_keywords')}}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <a href="{{route('categories.index')}}" type="reset" class="btn btn-warning">Back</a>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
