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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contact us</h4>
                        <div class="basic-form">
                            @if(isset($contactus))
                            <form id="myForm" method="POST" action="{{route('admin.contact-us.update',$contactus->id)}}">
                            @method("PUT")
                            @else
                            <form id="myForm" method="POST" action="{{route('admin.contact-us.store')}}">
                            @method("POST")
                            @endif
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" value="{{$contactus->name." ".$contactus->last_name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" value="{{$contactus->email}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" value="{{$contactus->phone}}" disabled>
                                </div>

                                <div class="form-group">
                                    <label>subject</label>
                                    <input type="text" class="form-control" placeholder="subject" value="{{$contactus->subject}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>message</label>
                                    <textarea class="form-control"  placeholder="message" disabled>{{ $contactus->message}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Reply</label>
                                    <textarea name="reply" id="reply" class="form-control"  placeholder="Reply">{{ old('reply') ?? $contactus->reply ?? "" }}</textarea>
                                    @error('reply')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <button type="submit" name="submit" class="btn btn-dark">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!-- #/ content body -->
@endsection
