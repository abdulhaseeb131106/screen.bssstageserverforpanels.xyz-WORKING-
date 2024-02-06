@extends('layout.admin')
@section('title', 'Edit - User')
@section('content')
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
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
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Employee ID</label>
                            <input type="text" class="form-control" name="employ_id" value="{{ $user->employ_id }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Employee Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name}}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Employee Mail</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    
                    </div>
                    <div class="form-group row">
                            <div class="col-md-4">
                            <label for="">Region</label>
                            <select name="region_id" id="region" class="form-control">
                                <option value="" selected disabled>--- Select Region ---</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}" {{ $user->region_id == $region->id ? 'selected' : '' }}>{{$region->region_name}}</option>
                                @endforeach
                            </select>
                        </div>
                       <div class="col-md-4">
                            <label for="">County</label>
                            <select name="county_id" id="country" class="form-control">
                                <option value="" selected disabled>--- Select County ---</option>
                                   @foreach($counties as $county)
                                <option value="{{$county->id}}"{{ $user->county_id == $county->id ? 'selected' :'' }}>{{$county->county_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Centre</label>                        
                            <select name="centre_id" id="" class="form-control">
                                <option value="" selected disabled>--- Select Centre ---</option>
                                @foreach($centres as $centre)
                                    <option value="{{$centre->id}}" {{ $user->centre_id == $centre->id ? 'selected' : '' }} >{{$centre->centre_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="password" value="">
                        </div>
                        
                    </div>
                <div class="col-md-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Update</button>
                </div>
            </form>
        </div>
@endsection
@push('scripts')
 <script>
         $(document).ready(function () {
            $('#region').on('change',function(e) {

                var region_id = e.target.value;
                $.ajax({
                  url:"{{ route('user.dropdown') }}",
                  type:"POST",
                  data: {
                      region_id: region_id,
                      _token: "{{ csrf_token() }}"
                    },

                  success:function (data) {
                         $('#country').empty();
                    for (var i = 0; i < data.countries.length; i++) {
                         $('#country').append('<option value="'+data.countries[i].id+'">'+data.countries[i].county_name+'</option>');
                    }

                  }


              })
            });

        });
   </script>

@endpush
