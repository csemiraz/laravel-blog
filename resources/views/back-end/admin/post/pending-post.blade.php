@extends('back-end.master')
@section('title')
    Post : Manage Post
@endsection

@section('mainContent')

<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <a href="{{ route('add-post') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Add Post</a>
                <hr><br>
                <h5>All Posts <span class="badge badge-info">{{ $posts->count() }}</span></h5>
                
                <div class=" card">
                    <div class="card-header text-center">
                        Manage Post
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-responsive-sm display">
                            <thead>
                                <tr class="">
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Post Author</th>
                                    <th>Description</th>
                                    <th>Publication Status</th>
                                    <th>Approval Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $key=>$post)
                                <tr>
                                    <th scope="row">{{ $key+1}}</th>
                                    <td>{{ str_limit($post->title, 15) }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{!! str_limit($post->description, '20') !!}</td>
                                    <td>{{ $post->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        @if($post->approval_status == true)
                                        <span class="badge badge-success">Approved</span>
                                        @else
                                        <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                       <a href="{{ route('approve-post', ['id'=>$post->id]) }}" class=" badge badge-success" title="Approve"><i class="fas fa-check"></i> </a>
                                       <a href="{{ route('details-post', ['id'=>$post->id]) }}" class=" badge badge-secondary" title="View"><i class="fas fa-eye"></i> </a>
                                       @if($post->publication_status == 1)
                                        <a href="{{ route('unpublish-post', ['id'=>$post->id]) }}" class=" badge badge-success" title="Unpublish"><i class="fas fa-arrow-up"></i> </a>
                                       @else
                                        <a href="{{ route('publish-post', ['id'=>$post->id]) }}" class=" badge badge-warning" title="Publish"><i class="fas fa-arrow-down"></i> </a>
                                       @endif
                                        <a href="{{ route('edit-post', ['id'=>$post->id]) }}" class=" badge badge-info" title="Edit"><i class="fas fa-edit"></i> </a>
                                        <a href="#" class="badge badge-danger" title="Delete" onclick="deleteData({{ $post->id }})"><i class="fas fa-trash-alt"></i> </a>
        
                                        <form id="delete-form-{{ $post->id }}" action="{{ route('delete-post', ['id'=>$post->id]) }}" method="POST" style="display:none; ">
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