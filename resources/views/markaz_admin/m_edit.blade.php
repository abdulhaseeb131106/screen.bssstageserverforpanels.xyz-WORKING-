@extends('layout_for_markaz.admin')
@section('title', 'Markaz Admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Prayer</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Timing Details</h6>
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
            <form action="{{ route('markaz_admin.m_update', ['id' => $prayer->id]) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Fajar Jamat</label>
                        <input type="time" class="form-control" name="fajar_jamat" value="{{$prayer->fajar_jamat}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Zuhr Jamat</label>
                        <input type="time" class="form-control" name="zuhr_jamat" value="{{$prayer->zuhr_jamat}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Asr Jamat</label>
                        <input type="time" class="form-control" name="asr_jamat" value="{{$prayer->asr_jamat}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Maghrib Jamat</label>
                        <input type="time" class="form-control" name="maghrib_jamat" value="{{$prayer->maghrib_jamat}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Isha Jamat</label>
                        <input type="time" class="form-control" name="Isha_jamat" value="{{$prayer->Isha_jamat}}">
                    </div>

                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Sun Rise</label>
                        <input type="time" class="form-control" name="sun_rise" value="{{$prayer->sun_rise}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Chaasht</label>
                        <input type="time" class="form-control" name="chaasht" value="{{$prayer->chaasht}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Zawal</label>
                        <input type="time" class="form-control" name="zawal" value="{{$prayer->zawal}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Jumua</label>
                        <input type="time" class="form-control" name="jumua" value="{{$prayer->jumua}}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Jumua/Ijtimah</label>
                        <input type="time" class="form-control" name="jumma_ijtimah" value="{{$prayer->jumua}}">
                    </div>
                </div>

                <div class="col-md-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Update</button>
                </div>
            </form>
        </div>
@endsection
