@extends('layout.admin')
@section('title', 'Region')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Region</h1>
        <a href="{{ route('region.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            Create New
            <i class="fas fa-plus fa-sm mx-2"></i>
        </a>
    </div>
    <div class="card shadow row">
        <div class="card-header" style="float: left;">
            <h5 class="font-weight-bold text-primary" style="margin-top: 1rem;">Region</h5>
            <div class="card-body" style="margin-left: 39rem; margin-top: -3rem; margin-bottom: -1rem;">
            @php
                $month = $hijri_date->month;
                $date = $hijri_date->date;
            @endphp
            <h5 class="fw-bold" >Hijri Date: {{ $date . $month }}
            <a href="{{ route('region.skip', $hijri_date->id) }}" class="btn btn-primary">Skip</a>
            <a href="{{ route('region.back', $hijri_date->id) }}" class="btn btn-primary">Back</a></h5>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($regions)
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Region</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody> 
                    @foreach($regions as $region)
                        <tr>
                            <td>{{$region->region_name}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('region.delete', $region->id) }}" class="btn btn-danger btn-sm mx-2" onclick="showDeleteConfirmation(event)">
                                        <i class="fas fa-trash fa-sm"></i>
                                    </a>                       
                                    <a href="{{ route('region.edit', $region->id) }}" class="btn btn-primary btn-sm mx-2">
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