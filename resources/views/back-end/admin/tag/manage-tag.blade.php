@extends('back-end.master')
@section('title')
    Manage Tag
@endsection

@section('mainContent')

<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <a href="{{ route('add-tag') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Add Tag</a>
                <hr><br>
                <h5>All Tags <span class="badge badge-info">{{ $tags->count() }}</span></h5>
                <div class=" card">
                    <div class="card-header text-center">
                        Manage Tag
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-responsive-sm display">
                            <thead>
                                <tr class="">
                                    <th>SL</th>
                                    <th>Tag Name</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $key=>$tag)
                                <tr>
                                    <th scope="row">{{ $key+1}}</th>
                                    <td>{{ $tag->tag_name }}</td>
                                    <td>{{ $tag->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                       @if($tag->publication_status == 1)
                                        <a href="{{ route('unpublish-tag', ['id'=>$tag->id]) }}" class=" badge badge-success" title="Unpublish"><i class="fas fa-arrow-up"></i> </a>
                                       @else
                                        <a href="{{ route('publish-tag', ['id'=>$tag->id]) }}" class=" badge badge-warning" title="Publish"><i class="fas fa-arrow-down"></i> </a>
                                       @endif
                                        <a href="{{ route('edit-tag', ['id'=>$tag->id]) }}" class=" badge badge-info" title="Edit"><i class="fas fa-edit"></i> </a>
                                        <a href="#" class="badge badge-danger" title="Delete" onclick="deleteData({{ $tag->id }})"><i class="fas fa-trash-alt"></i> </a>
        
                                        <form id="delete-form-{{ $tag->id }}" action="{{ route('delete-tag', ['id'=>$tag->id]) }}" method="POST" style="display:none; ">
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