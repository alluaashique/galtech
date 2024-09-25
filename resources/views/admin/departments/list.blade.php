@extends('admin.layout.app')
@section('content')
 <!-- content body -->
 <div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Departments</h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Departments</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{route('admin.departments.create')}}"> New Department</a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Department Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <a href="{{route('admin.departments.edit',$item->id)}}"> Edit</a>
                                                <a href="javascript:void(0)" class="delete" data-id="{{$item->id}}"> Delete</a>
                                                <form action="{{route('admin.departments.destroy',$item->id)}}" id="delete_{{$item->id}}" method="POST">
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
