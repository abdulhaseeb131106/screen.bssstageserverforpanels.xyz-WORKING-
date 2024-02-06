@extends('layout_for_markaz.admin')
@section('title', 'Markaz Admin')
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Logos</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Logos image</h6>
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


            <form action="{{ route('logo.logouploader') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="file">Please use an image with the dimensions 400x92</label><br><hr>
                        <input type="file" id="file" name="file[]" multiple="multiple" value=""/>
                    </div>
                </div>

                <div class="col-md-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
