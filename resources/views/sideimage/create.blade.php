@extends('layout.admin')
@section('title', 'Region')
@section('content')
<style>
    .gradient-box {
    width: 200px;
    height: 200px;
    background: linear-gradient(to right, #ff0000, #ffff00); /* Default gradient */
    /* You can dynamically set the gradient using JavaScript */
}
</style>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Side Image</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add side image</h6>
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


            <form action="{{route('sideimage.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="file">Image</label><br><hr>
                        <input type="file" id="file" name="file[]" multiple="multiple" value=""/>
                    </div>
                   <div class="col-md-4">
                    <label for="color1">Choose a gradient color:</label><br>
                    <input type="color" id="color1" name="color1">
                    <input type="color" id="color2" name="color2">
                    <div class="gradient-box"></div>
                    
                </div>

                    <script>
                        const color1 = document.getElementById('color1');
                        const color2 = document.getElementById('color2');
                        const gradientBox = document.querySelector('.gradient-box');
                        
                        color1.addEventListener('input', updateGradient);
                        color2.addEventListener('input', updateGradient);
                        
                        function updateGradient() {
                            gradientBox.style.background = `linear-gradient(to right, ${color1.value}, ${color2.value})`;
                        }
                    </script>
                </div>

                <div class="col-md-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
