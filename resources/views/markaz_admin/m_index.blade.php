@extends('layout_for_markaz.admin') 
@section('title', 'Markaz Admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Prayer Timing</h1>
            
     
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Prayer Timing</h6>
              
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
                @if($prayer)
                <form action="" method="POST">
                    @csrf
                  
                    <div class="form-group row">
                        <div class="col-md-4">
                             
                            <label for="">Fajar Jamat</label>
                            <input type="time" class="form-control" name="fajar_jamat" readonly value="{{ $prayer->fajar_jamat}}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Zuhr Jamat</label>
                            <input type="time" class="form-control" name="zuhr_jamat" readonly value="{{ $prayer->zuhr_jamat}}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Asr Jamat</label>
                            <input type="time" class="form-control" name="asr_jamat" readonly value="{{$prayer->asr_jamat }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Maghrib Jamat</label>
                            <input type="time" class="form-control" name="maghrib_jamat" readonly value="{{ $prayer->maghrib_jamat}}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Isha Jamat</label>
                            <input type="time" class="form-control" name="Isha_jamat" readonly value="{{$prayer->Isha_jamat }}">
                        </div>
                        
                          

                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Sun Rise</label>
                            <input type="time" class="form-control" name="sun_rise" readonly value="{{$prayer->sun_rise}}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Chaasht</label>
                            <input type="time" class="form-control" name="chaasht" readonly value="{{$prayer->chaasht }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Zawal</label>
                            <input type="time" class="form-control" name="zawal" readonly value="{{$prayer->zawal}}">
                        </div>
                    </div>
                    <div class="form-group row">
                    
                      <div class="col-md-4">
                            <label for="">Jumua</label>
                            <input type="time" class="form-control" name="jumua" readonly value="{{$prayer->jumua}}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Jumua/Ijtimah</label>
                            <input type="time" class="form-control" name="jumma_ijtimah" readonly value="{{  $prayer->jumma_ijtimah}}">
                        </div>


                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Date</label>
                            <input type="date" class="form-control" name="jumma_ijtimah" readonly value="{{  $prayer->date}}">
                        </div>
                    </div>
                    
                    <div class="col-md-4 pt-2">
                       <a href="{{ route('markaz_admin.m_edit', ['id' => $prayer->id]) }}" class="btn btn-primary">Update</a><br><br>
                    </div>
                </form>
                @else

                <form action="" method="POST">
                    @csrf
                  
                    <div class="form-group row">
                        <div class="col-md-4">
                             
                            <label for="">Fajar Jamat</label>
                            <input type="time" class="form-control" name="fajar_jamat" readonly value="00:00:00">
                        </div>
                        <div class="col-md-4">
                            <label for="">Zuhr Jamat</label>
                            <input type="time" class="form-control" name="zuhr_jamat" readonly value="00:00:00">
                        </div>
                        <div class="col-md-4">
                            <label for="">Asr Jamat</label>
                            <input type="time" class="form-control" name="asr_jamat" readonly value="00:00:00">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Maghrib Jamat</label>
                            <input type="time" class="form-control" name="maghrib_jamat" readonly value="00:00:00">
                        </div>
                        <div class="col-md-4">
                            <label for="">Isha Jamat</label>
                            <input type="time" class="form-control" name="Isha_jamat" readonly value="00:00:00">
                        </div>
                        
                          

                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Sun Rise</label>
                            <input type="time" class="form-control" name="sun_rise" readonly value="00:00:00">
                        </div>
                        <div class="col-md-4">
                            <label for="">Chaasht</label>
                            <input type="time" class="form-control" name="chaasht" readonly value="00:00:00">
                        </div>
                        <div class="col-md-4">
                            <label for="">Zawal</label>
                            <input type="time" class="form-control" name="zawal" readonly value="00:00:00">
                        </div>
                    </div>
                    <div class="form-group row">
                    
                      <div class="col-md-4">
                            <label for="">Jumua</label>
                            <input type="time" class="form-control" name="jumua" readonly value="00:00:00">
                        </div>
                        <div class="col-md-4">
                            <label for="">Jumua/Ijtimah</label>
                            <input type="time" class="form-control" name="jumma_ijtimah" readonly value="00:00:00">
                        </div>


                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Date</label>
                            <input type="date" class="form-control" name="jumma_ijtimah" readonly value="">
                        </div>
                    </div>
                    
                    
                </form>
                @endif
            </div>
    </div>
    </div>
@endsection
