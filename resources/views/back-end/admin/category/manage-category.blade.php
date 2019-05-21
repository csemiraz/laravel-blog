@extends('back-end.master')
@section('title')
    Manage Category
@endsection

@section('mainContent')

<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <a href="{{ route('add-category') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Add Category</a>
                <hr>
                <h5>All Category <span class="badge badge-info">{{ $categories->count() }}</span></h5>
                <div class=" card">
                    <div class="card-header text-center">
                        Manage Category
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-responsive-sm display">
                            <thead>
                                <tr class="">
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key=>$category)
                                <tr>
                                    <th scope="row">{{ $key+1}}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_description }}</td>
                                    <td>
                                        @if($category->image == 'category.jpg')
                                            <img src="{{ asset('assets/images/category/category.jpg') }}" alt="{{ $category->category_name }}" width="100px" height="80px">                            
                                        @else
                                            <img src="{{ asset('assets/images/category/slider/'.$category->image) }}" alt="{{ $category->category_name }}" width="100px" height="80px">
                                        @endif
                                    </td>
                                    <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                       @if($category->publication_status == 1)
                                        <a href="{{ route('unpublish-category', ['id'=>$category->id]) }}" class=" badge badge-success" title="Unpublish"><i class="fas fa-arrow-up"></i> </a>
                                       @else
                                        <a href="{{ route('publish-category', ['id'=>$category->id]) }}" class=" badge badge-warning" title="Publish"><i class="fas fa-arrow-down"></i> </a>
                                       @endif
                                        <a href="{{ route('edit-category', ['id'=>$category->id]) }}" class=" badge badge-info" title="Edit"><i class="fas fa-edit"></i> </a>
                                        <a href="#" class="badge badge-danger" title="Delete" onclick="deleteData({{ $category->id }})"><i class="fas fa-trash-alt"></i> </a>
        
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('delete-category', ['id'=>$category->id]) }}" method="POST" style="display:none; ">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection