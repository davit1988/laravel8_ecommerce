@extends('admin.layouts.app')
@section('page_title','Categories')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Category Lists</h6>
            <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Category</a>
        </div>
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                @if(count($categories)>0)
                 <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Desc</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Popular</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{!! $category->description !!}</td>
                            <td>
                                <img src="{{asset('uploads/category/'.$category->image)}}" class="img-fluid" style="max-width:80px; height:50px" alt="{{$category->image}}">
                            </td>
                            <td>
                                @if($category->status == '1')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-warning">Not active</span>
                                @endif
                            </td>
                            <td>
                                @if($category->popular == '1')
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-warning">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}"  class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{route('categories.destroy',[$category->id])}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm dltBtn" onclick="return deleteFunction();" data-id={{$category->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="pagination pagination-sm m-0 float-right">
                        {{$categories->links()}}
                    </div>
                @else
                    <h6 class="text-center">No Categories found!!! Please create Category</h6>
                @endif

            </div>

    </div>
    </div>
@endsection

