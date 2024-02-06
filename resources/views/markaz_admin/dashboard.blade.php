@extends('layout_for_markaz.admin')
@section('title', 'Markaz Admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Prayer Timings</h1>
       
    </div>
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> All Prayer Timings </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($prayer)
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th>Date</th>
                            <th>Fajar Start</th>
                            <th>Fajar Azan</th>
                            <th>Fajar</th>
                            <th>Zuhr Start</th>
                            <th>Zuhr Azan</th>
                            <th>Zuhr</th>
                            <th>Asr Start</th>
                            <th>Asr Azan</th>
                            <th>Asr</th>
                            <th>Maghrib Start</th>
                            <th>Maghrib Azan</th>
                            <th>Maghrib</th>
                            <th>Isha Start</th>
                            <th>Isha Azan</th>
                            <th>Isha</th>
                            <th>Sun Rise</th>
                            <th>Chaast</th>
                            <th>Zawal</th>
                            <th>Jummua Azan</th>
                            <th>Jummua</th>
                            <th>Ijtimah</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($prayer as $prayers)
                        <tr>
                            <td>{{$prayers->date}}</td>
                            <td>{{$prayers->fajar_start}}</td>
                            <td>{{$prayers->fajar_azan}}</td>
                            <td>{{$prayers->fajar_jamat}}</td>
                            <td>{{$prayers->zuhr_start}}</td>
                            <td>{{$prayers->zuhr_azan}}</td>
                            <td>{{$prayers->zuhr_jamat}}</td>
                            <td>{{$prayers->asar_start}}</td>
                            <td>{{$prayers->asr_azan}}</td>
                            <td>{{$prayers->asr_jamat}}</td>
                            <td>{{$prayers->maghrib_start}}</td>
                            <td>{{$prayers->maghrib_azan}}</td>
                            <td>{{$prayers->maghrib_jamat}}</td>
                            <td>{{$prayers->isha_start}}</td>
                            <td>{{$prayers->isha_azan}}</td>
                            <td>{{$prayers->Isha_jamat}}</td>
                            <td>{{$prayers->sun_rise}}</td>
                            <td>{{$prayers->chaasht}}</td>
                            <td>{{$prayers->zawal}}</td>
                            <td>{{$prayers->jumah_azan}}</td>
                            <td>{{$prayers->jumua}}</td>
                            <td>{{$prayers->jumma_ijtimah}}</td>
                            <td>
                                <div class="d-flex">

                                        <a href="{{ route('markaz_admin.delete', $prayers->id) }}" class="btn btn-danger btn-sm mx-2" onclick="showDeleteConfirmation(event)">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </a>
                                        <a href="{{ route('markaz_admin.m_edit', ['id' => $prayers->id]) }}" class="btn btn-primary">
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
