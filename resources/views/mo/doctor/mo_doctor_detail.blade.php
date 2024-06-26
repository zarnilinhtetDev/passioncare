@include('landing_page.header_section')
<style>
    .card,
    table tr,
    th,
    td,
    input,
    select,
    textarea {
        font-size: 1.5rem !important;
    }

    .btn {
        font-size: 13px !important;
    }

    @media (max-width: 768px) {

        .card,
        table tr,
        th,
        td,
        input,
        select,
        textarea {
            font-size: 13px !important;
        }

        .btn {
            font-size: 11px !important;
        }
    }
</style>
@include('landing_page.nav')
<div class="d-none d-lg-block d-xl-none" style="height:60px;"></div>
{{-- Tabs with table Section --}}
<div id="exTab1" class="container mt-md-5 mb-lg-5 px-0">

    <div class="tab-content clearfix ">
        <!-- <div style="margin-top: 5%">
        </div> -->
        <div class="" style="margin-top: 3%">

            <div class=" container-fluid">
                <section class="content-header">
                    <div class="container">
                        <div class="row mb-4 mt-5 mt-md-3">
                            <div class="col-6">
                                <h1 class="text-primary">Doctor Detail</h1>
                            </div>
                            <div class="col-6">

                                <div class="d-flex justify-content-end">
                                    <a href="{{route('doctor#doctor_edit',$doctor->id)}}" class="btn btn-lg btn-success">Edit</a>
                                    <a href="{{ route('doctor') }}" class="btn btn-lg btn-primary ms-4">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content container mb-5">

                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="card shadow bg-body rounded p-2 mb-md-5 mt-5">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group d-flex justify-content-center">
                                            <img src="{{ asset('profile/'.$doctor->profile) }}" class="rounded-circle mt-5 mb-4 doctorPro" style="width: 140px; height: 140px;border:1px solid black;">
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Name</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">
                                                {{ $doctor->doctor_name }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Phone Number</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{ $doctor->phone_number }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">City</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{ $doctor->city }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Date of Birth</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">12.1.2000</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Gender</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{ $doctor->gender }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Medical License</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{ $doctor->medical_license }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Degree</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{ $doctor->degree }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Specialization</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{ $doctor->doctor_specialities }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Other Certification</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{ $doctor->other_certification }}</span>
                                        </div>
                                        <div class="col-md-12 form-group row" class="dt_span">
                                            <span class="col-5 fw-bold text-end">Work Experience</span>
                                            <span class="col-2 fw-bold text-center">:</span>
                                            <span class="col-5 fw-bold text-start">{{$doctor->work_experiance}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none d-lg-block" style="height:50px !important;"></div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-8 mb-md-5">
                            <div class="card shadow mt-5 p-2 py-md-3 py-lg-2 bg-body rounded table-responsive">
                                <h3 class="card-title text-bold">History</h3>
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Ticket ID</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tickets as $key => $ticket)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td><a href="{{url("view_ticket",$ticket->id)}}" class="btn btn-primary">Ticket-{{$ticket->id}}</a></td>
                                                <td>{{$ticket->ticket_stage}}</td>
                                                <td>{{$ticket->updated_at->format("d-m-Y")}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- Table End --}}
                                </div>

                            </div>
                            <div class="d-none d-md-block d-lg-none" style="height:35px;"></div>
                            <div class="card shadow mt-5 p-2 py-md-3 py-lg-2 bg-body rounded table-responsive">
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Hospital Name</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($modoctor2s as $key => $modoctor2)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{$modoctor2->hospitalname}}</td>
                                                @foreach ($hospitals as $hospital)
                                                @if ($hospital->hospital_name == $modoctor2->hospitalname)
                                                <td>{{ $hospital->hospital_phone_number }}</td>
                                                <td>{{ $hospital->hospital_address }}</td>
                                                @endif
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- Table End --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

</div>

<footer id="bottom-nav">
    <div class="bottom-nav" style="background-color: #337AB7">
        <a href="{{ url('/') }}">
            <i class="fas fa-home"></i>
            Home
        </a>
        @if (Auth::user()->type == 'mo')
        <a class="nav-link text-white" href="{{ url('/mo_hospital') }}"><i class="fa-solid fa-hospital"></i>Hospital</a>
        @else
        <a class="nav-link text-white" href="{{ url('/hospital') }}"><i class="fa-solid fa-hospital"></i>Hospital</a>
        @endif
        <div class="dropdown">
            <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="text-white"><i class="fa-solid fa-user"></i> {{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu " style="background-color: #F0F5F9;">
                @if (Auth::user()->type == 'mo' && Auth::user()->level == '1')
                    <a class="p-1 btn changelogout text-dark" href="{{ url('user') }}" style="width: 50px">User</a>
                    <a class="p-1 btn changelogout text-dark" href="{{ url('calculate_time_setting') }}" style="width: 3px">Setting</a>
                @elseif (Auth::user()->type == 'mo' && Auth::user()->level != '1')
                    <a href="{{route('userEdit', Auth::user()->id)}}" class="p-1 btn changelogout" style="width: 100px">Profile Edit</a>
                @elseif(Auth::user()->type == 'patient')
                    <a href="{{ url('/profile') }}" class="p-1 btn changelogout text-dark" style="width: 30px;">Profile</a>
                @elseif(Auth::user()->type == 'hospital')
                    <a href="{{route('hospitalProfile')}}" class="p-1 btn changelogout text-dark" style="width: 30px;">Profile</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-1 btn changelogout" style="width: 50px">
                        <span class="text-dark">Logout</span></button>
                </form>
            </div>
        </div>
        @if (Auth::user()->type == 'mo')
        <a class="nav-link text-white" href="{{ url('/mo_doctor') }}"><i class="fa-solid fa-user-doctor"></i>Doctor</a>
        @else
        <a class="nav-link text-white" href="{{ url('/doctor') }}"><i class="fa-solid fa-user-doctor"></i>Doctor</a>
        @endif
        <a href="#">
            <i class="fas fa-heart"></i>
            Favorites
        </a>
        <a href="#" class="text-dark">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>
</footer>

<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            order: [
                [0, 'desc']
            ],
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (action column) from export
                }
            }],
            pageLength: 3
        });
    });
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            order: [
                [0, 'desc']
            ],
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (action column) from export
                }
            }],
            pageLength: 3
        });
    });
</script>

@include('landing_page.footer_section')
