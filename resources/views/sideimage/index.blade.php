@extends('layout.admin')
@section('title', 'Side Image')
@section('content')
<style>
    img{
        height: 200px;
        width: 200px;
    }
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Side Images</h1>
        <!--<a href="{{ route('sideimage.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">-->
        <!--    Create New-->
        <!--    <i class="fas fa-plus fa-sm mx-2"></i>-->
        <!--</a>-->
    </div>
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Side Images (Only Top Image Displayed)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($slider)
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>SIDE IMAGES</th>
                            <th>Theme</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($slider as $sliders)
                        <tr>
                            <td>{{$sliders->id}}</td>
                            <td><img src="/images/{{$sliders->image_name}}" alt=""></td>
                                                       @php
                                $colors = explode(',', $sliders->theme ?? ''); // Ensure $sliders->theme is set and is a string
                                
                                // Check if the $colors array contains at least two elements before processing
                                if(count($colors) >= 2) {
                                    $color1 = sscanf($colors[0], "#%02x%02x%02x");
                                    $color2 = sscanf($colors[1], "#%02x%02x%02x");
                            
                                    // Ensure both sscanf calls were successful before using their values
                                    if(count($color1) === 3 && count($color2) === 3) {
                                        $gradient = "linear-gradient(to right, rgb($color1[0], $color1[1], $color1[2]), rgb($color2[0], $color2[1], $color2[2]))";
                                    } else {
                                        $gradient = ''; // Set a default value if color conversion fails
                                    }
                                } else {
                                    $gradient = ''; // Set a default value if colors array doesn't have two elements
                                }
                            @endphp
                            
                            <td>
                                <div style="background: {{ $gradient }}; height: 100px; width: 200px; text-align:center; padding-top:10%; ">Theme</div>
                            </td>

                            <td>
                                <div class="d-flex">

                                        <!--<a href="{{ route('sideimage.delete', $sliders->id) }}" class="btn btn-danger btn-sm mx-2" onclick="showDeleteConfirmation(event)">-->
                                        <!--    <i class="fas fa-trash fa-sm"></i>-->
                                        <!--</a>-->


                                    <a href="{{ route('sideimage.edit', $sliders->id) }}" class="btn btn-primary btn-sm mx-2">
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
