@extends('layout.admin')
@section('title', 'Centre')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Centre</h1>
        <a href="{{ route('centre.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Create New
            <i class="fas fa-plus fa-sm mx-2"></i>
        </a>
    </div>
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Centre</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($centres)
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Centre</th>
                            <th>Region</th>
                            <th>County</th>                  
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody> 
                    @foreach($centres as $centre)
                        <tr>
                            <td>{{$centre->centre_name}}</td>
                            <td>{{$centre->region_name}}</td>
                            <td>{{$centre->county_name}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('centre.delete', $centre->id) }}" class="btn btn-danger btn-sm mx-2" onclick="showDeleteConfirmation(event)">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </a>     
                                                                   
                                    <a href="{{ route('centre.edit', $centre->id) }}" class="btn btn-primary btn-sm mx-2">
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