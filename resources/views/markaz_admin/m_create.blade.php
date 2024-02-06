@extends('layout_for_markaz.admin')
@section('title', 'Markaz Admin')
@section('content')
<style>
    h1{
        text-align:center;
    }
</style>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Csv File</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Csv </h6>
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
               <div class="form-group row">
                    <div class="col-md-4">
                  <form action="{{ route('markaz_admin.upload.csv') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <label for="file">Upload File</label><br> <hr>
                      <input type="file" name="csv_file" value="$Texting[$i]" >
                         
                        
                         <div class="col-md-4 pt-2">
                      <button type="submit"  class="btn btn-primary btn-block mt-4" >Upload CSV</button>
                        </div>
                  </form>
        </div>
    </div>
        <hr>
        <h1>Sample File All Months</h1>
        
               <div class="form-group row">
            <div class="col-md-3">
            <a href="{{ asset('month_timings/january.csv') }}" class="btn btn-outline-primary w-100" download>
                January File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/feb.csv') }}" class="btn btn-outline-primary w-100" download>
               February File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/march.csv') }}" class="btn btn-outline-primary w-100" download>
                March File <i class="fa-solid fa-download"></i>
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/april.csv') }}" class="btn btn-outline-primary w-100" download>
                April File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
        </div>
               <div class="form-group row">
            <div class="col-md-3">
            <a href="{{ asset('month_timings/may.csv') }}" class="btn btn-outline-primary w-100" download>
                May File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/june.csv') }}" class="btn btn-outline-primary w-100" download>
                June File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/july.csv') }}" class="btn btn-outline-primary w-100" download>
                July File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/august.csv') }}" class="btn btn-outline-primary w-100" download>
                August File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
        </div>
               <div class="form-group row">
            <div class="col-md-3">
            <a href="{{ asset('month_timings/september.csv') }}" class="btn btn-outline-primary w-100" download>
                September File <i class="fa-solid fa-download"></i>
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/october.csv') }}" class="btn btn-outline-primary w-100" download>
            October File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/november.csv') }}" class="btn btn-outline-primary w-100" download>
                November File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
            <div class="col-md-3">
            <a href="{{ asset('month_timings/december.csv') }}" class="btn btn-outline-primary w-100"  download>
                December File <i class="fa-solid fa-download"></i> 
                
            </a>
        </div>
        </div>
</div>
@endsection
