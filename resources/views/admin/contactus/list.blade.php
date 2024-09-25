@extends('admin.layout.app')
@section('content')
 <!-- content body -->
 <div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Contact us</h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Contact us</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Reply</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contactus as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->last_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->subject}}</td>
                                            <td>{{$item->message}}</td>
                                            <td>{{$item->reply}}</td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-danger">Not Answered</span>
                                                @elseif($item->status == 2)
                                                    <span class="badge badge-success">Answered</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.contact-us.edit',$item->id)}}"> Edit</a>
                                                <a href="javascript:void(0)" class="delete" data-id="{{$item->id}}"> Delete</a>
                                                <form action="{{route('admin.contact-us.destroy',$item->id)}}" id="delete_{{$item->id}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
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
    </div>
    <!-- #/ container -->
</div>
<!-- #/ content body -->

<script>
$(document).ready(function() {
    $('.delete').on('click', function() {
        var id = $(this).data('id');
        var form = $('#delete_' + id);
        if (confirm("Are you sure you want to delete this department?")) {
            form.submit();
        }
    });
});
</script>
@endsection
