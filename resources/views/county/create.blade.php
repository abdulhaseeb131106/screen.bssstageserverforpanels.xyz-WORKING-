@extends('layout.admin')
@section('title', 'Create - County')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create County</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">County Details</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('county.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">County Name</label>
                            <input type="text" class="form-control" name="county_name" value="{{ old('county_name') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Region</label>                        
                            <select name="region_id" id="" class="form-control">
                                <option value="" selected disabled>--- Select Region ---</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-block mt-4">Create</button>
                    </div>
                </form>
            </div>
    </div>
@endsection
