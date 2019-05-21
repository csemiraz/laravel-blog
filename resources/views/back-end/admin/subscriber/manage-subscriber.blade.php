@extends('back-end.master')
@section('title')
    Manage Subscriber
@endsection

@section('mainContent')

<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <h5>All Subscribers <span class="badge badge-info">{{ $subscribers->count() }}</span></h5>
                <div class=" card">
                    <div class="card-header text-center">
                        Manage Subscriber
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-responsive-sm display">
                            <thead>
                                <tr class="">
                                    <th>SL</th>
                                    <th>Subscriber Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $key=>$subscriber)
                                <tr>
                                    <th scope="row">{{ $key+1}}</th>
                                    <td>{{ $subscriber->email }}</td>
                                   
                                    <td>  
                                        <a href="#" class="badge badge-danger" title="Delete" onclick="deleteData({{ $subscriber->id }})"><i class="fas fa-trash-alt"></i> </a>
        
                                        <form id="delete-form-{{ $subscriber->id }}" action="{{ route('delete-subscriber', ['id'=>$subscriber->id]) }}" method="POST" style="display:none; ">
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