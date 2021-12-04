@extends('admin.layouts.app')
@section('page_title','Products')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Products Lists</h6>
            <a href="{{route('products.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
        </div>
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                @if(count($products)>0)
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{!! $product->description !!}</td>
                                <td>
                                    <img src="{{asset('uploads/products/'.$product->image)}}" class="img-fluid" style="max-width:80px; height:50px" alt="{{$product->image}}">
                                </td>
                                <td>
                                    <a href="{{route('products.edit',$product->id)}}"  class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{route('products.destroy',[$product->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" onclick="return deleteFunction();" data-id={{$product->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination pagination-sm m-0 float-right">
                        {{$products->links()}}
                    </div>
                @else
                    <h6 class="text-center">No Products found!!! Please create Category</h6>
                @endif

            </div>

        </div>
    </div>
@endsection

