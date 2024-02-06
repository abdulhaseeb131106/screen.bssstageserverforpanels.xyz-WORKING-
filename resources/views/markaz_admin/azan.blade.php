@extends('layout_for_markaz.admin')
@section('title', 'Markaz Admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Azan Timing </h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Azan Timings</h6>
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
            <form action="{{route('markaz_admin.double_update')}}" method="POST">
                @csrf
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="">Fajar</label>
                        <input type="number" min="1" max"30" step="1"  class="form-control w-75" name="fajar_azan" value="{{ old('fajar_azan') }}">
                    </div>
                        <div class="col-md-4">
                        <label for="">Zuhr</label>
                        <input type="number" min="1" max"30" step="1" class="form-control w-75" name="zuhr_azan" value="{{ old('zuhr_azan') }}">
                    </div>
                        <div class="col-md-4 ">
                        <label for="">Asr</label>
                        <input type="number" min="1" max"30" step="1" class="form-control w-75" name="asr_azan" value="{{ old('asr_azan') }}">
                    </div>
            </div>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="">Maghrib</label>
                        <input type="number" min="1" max"30" step="1" class="form-control w-75" name="maghrib_azan" value="{{ old('maghrib_azan') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Isha</label>
                        <input type="number" min="1" max"30" step="1" class="form-control w-75" name="isha_azan" value="{{ old('isha_azan') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Jummah</label>
                        <input type="number" min="1" max"30"  step="1" class="form-control w-75" name="jumah_azan" value="{{ old('jumah_azan') }}">
                    </div>

            </div>
            <div class="col-md-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block mt-4">Create</button>

            </div>
            </form>
        </div>
</div>
@endsection
