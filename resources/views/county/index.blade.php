@extends('layout.admin')
@section('title', 'County')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">County</h1>
        <a href="{{ route('county.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Create New
            <i class="fas fa-plus fa-sm mx-2"></i>
        </a>
    </div>
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">County</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($counties)
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>County</th>                  
                            <th>Region</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody> 
                    @foreach($counties as $county)
                        <tr>
                            <td>{{$county->county_name}}</td>
                            <td>{{$county->region_name}}</td>
                            <td>
                                <div class="d-flex">
                                     <a href="{{ route('county.delete', $county->id) }}" class="btn btn-danger btn-sm mx-2" onclick="showDeleteConfirmation(event)">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </a>     

                                    <a href="{{ route('county.edit', $county->id) }}" class="btn btn-primary btn-sm mx-2">
                                        <i class="fas fa-edit fa-sm"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>   
                        @endforeach
                    </tbody>
                </table>
                 @else
                <div class="alert alert-danger">No record Found!</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection