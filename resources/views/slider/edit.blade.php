@extends('layout_for_markaz.admin')
@section('title', 'Markaz Admin')
@section('content')
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Slider Images</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Slider Images Details</h6>
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
            <form action="{{ route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Id</label>
                        <input type="number" class="form-control" readonly name="id" value="{{$slider->id }}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Images</label>
                        <input type="file" class="form-control" name="image"> <!-- Change name to 'image' -->
                    </div>
                </div>
                <div class="col-md-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Update</button>
                </div>
            </form>
        </div>
@endsection
