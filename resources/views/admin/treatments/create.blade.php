@extends('admin.layout.app')
@section('content')
 <!-- content body -->
 <div class="content-body">
    <div class="container">
        <div class="row page-titles">
            <div class="col p-0">
                <h4>Treatments</h4>
            </div>
            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Treatments</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Treatments</h4>
                        <div class="basic-form">
                            <form id="myForm" method="POST" action="{{route('admin.treatments.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Treatment Name</label>
                                    <input type="text" id="treatments" name="treatments" class="form-control" placeholder="Treatments"
                                    value="{{ old('treatments') }}">
                                    @error('treatments')
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
