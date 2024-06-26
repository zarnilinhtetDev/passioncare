<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PassionCare</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/cubeportfolio/css/cubeportfolio.min.css') }}">
    {{-- <!-- <link href="{{ asset('css/nivo-lightbox.css') }}" rel="stylesheet" /> -->
    <!-- <link href="{{ asset('css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen" /> -->
    <!-- <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" media="screen" /> -->
    <!-- <link href="{{ asset('css/animate.css') }}" rel="stylesheet" /> --> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- template skin -->
    <link id="t-colors" href="color/default.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.2/css/buttons.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('plugins/cubeportfolio/css/landingpage.css') }}">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    table>th,
    tr {
        font-size: 1.5rem !important;
    }

    .btn {
        font-size: 1.3rem !important;
    }

    @media only screen and (max-width:560px) {

        table>th,
        tr {
            font-size: 1.2rem !important;
        }

        .btn {
            font-size: 1rem !important;
        }
    }
</style>

<body>
    @include('landing_page.nav')
    {{-- Tabs with table Section --}}
    <div id="exTab1" class="container mt-5">

        <div class="tab-content clearfix ">
            <div style="margin-top: 5%">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif

                @if (session('delete'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ session('delete') }}</strong>
                </div>
                @endif
                @if (auth()->user()->type == "patient")
                <h1>Doctor Conservation</h1>
                @else
                <h1>MO Waiting List</h1>
                @endif
            </div>

            <div class="tab-pane active" style="margin-top: 4%">

                <div class="table-responsive" style="overflow-y: auto;">
                    <table class="table table-bordered " id="example-1">
                        <thead class="thead">
                            <tr>
                                <th style="background-color: #FAF9F6" scope="col">No.</th>
                                <th style="background-color: #FAF9F6" scope="col">Booking ID</th>
                                <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                <th style="background-color: #FAF9F6" scope="col">Description</th>
                                <th style="background-color: #FAF9F6" scope="col">Order Date</th>
                                <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                @if (auth()->user()->type == "mo")
                                <th style="background-color: #FAF9F6" scope="col">Call Patient</th>
                                @else
                                <th style="background-color: #FAF9F6" scope="col">Ticket Info</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @foreach ($patient_records as $key => $patient_record)
                            @if (auth()->user()->type == 'mo')
                            @if($patient_record->ticket_created == "no")
                            <tr>
                                <td scope="row">{{$key + 1}}</td>
                                <td>
                                    {{ $patient_record->booking_no }}
                                </td>
                                {{-- @foreach ($patients as $patient)
                                            @if ($patient->id == $patient_record->patient_id)
                                            <td>{{ $patient->name }}</td>
                                @endif
                                @endforeach --}}
                                <td>{{$patient_record->patient->name}}</td>
                                <td>{{ $patient_record->description }}</td>
                                <td>{{ $patient_record->created_at->format('d-m-Y') }}</td>
                                @if ($patient_record->date)
                                <td>{{ $patient_record->date}}</td>
                                @else
                                <td class="text-danger">Appointment date မသတ်မှတ်ရသေးပါ။</td>
                                @endif
                                @if (auth()->user()->type == "mo")
                                <td class="text-center">
                                    @if(!isset($patient_record->date))
                                    <a href="{{url('/create_ticket',$patient_record->id)}}" class="btn btn-primary mb-2">Call Patient</a>
                                    @endif
                                </td>
                                @else
                                <td><a href="{{route('ticketInfo',$patient_record->id)}}" class="btn btn-primary mb-2">View Info</a></td>
                                @endif
                            </tr>
                            @endif
                            @else
                            <tr>
                                <td scope="row">{{$key + 1}}</td>
                                <td>
                                    {{ $patient_record->booking_no }}
                                </td>
                                {{-- @foreach ($patients as $patient)
                                            @if ($patient->id == $patient_record->patient_id)
                                            <td>{{ $patient->name }}</td>
                                @endif
                                @endforeach --}}
                                <td>{{$patient_record->patient->name}}</td>
                                <td>{{ $patient_record->description }}</td>
                                <td>{{ $patient_record->created_at->format('d-m-Y') }}</td>
                                @if ($patient_record->date && ($patient_record->ticket && $patient_record->ticket->assigned == "yes"))
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($patient_record->date)->format('d-m-Y / h:i A') }}
                                </td>
                                @else
                                <td class="text-center text-danger fw-bold">Appointment date မသတ်မှတ်ရသေးပါ။</td>
                                @endif
                                @if (auth()->user()->type == "mo")
                                <td class="text-center">
                                    @if(!isset($patient_record->date))
                                    <a href="{{url('/create_ticket',$patient_record->id)}}" class="btn btn-primary mb-2">Call Patient</a>
                                    @endif
                                </td>
                                @else
                                <td><a href="{{route('ticketInfo',$patient_record->id)}}" class="btn btn-primary mb-2">View Info</a></td>
                                @endif
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-5 mb-lg-0">
                <a href="{{ url("/") }}" class="btn btn-primary mb-2 px-4">
                    BACK
                </a>
            </div>
        </div>
    </div>

    </div>

    <footer id="bottom-nav" class="p-0">
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
                        <a class="p-1 btn changelogout text-dark" href="{{ url('calculate_time_setting') }}" style="width: 30px">Setting</a>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#example-1').DataTable({
                "lengthChange": false,
                // "responsive": true,
                "pageLength": 20,
            });
        });
    </script>

    @include('landing_page.footer_section')
