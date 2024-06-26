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
    <link href="{{ asset('css/nivo-lightbox.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('plugins/cubeportfolio/css/landingpage.css') }}">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #example-1_filter {
        text-align: left;
    }

    #example-1_info {
        text-align: left;
    }

    #example-1_paginate {
        text-align: left;
    }

    body {
        font-size: 130%;
    }

    table th,
    td {
        font-size: 1.5rem !important;
    }

    .btn {
        font-size: 13px !important;
    }

    @media (max-width: 768px) {

        table th,
        td {
            font-size: 13px !important;
        }

        .btn {
            font-size: 8px !important;
        }
    }

    a {
        text-decoration: none;
    }

    #mo_li:hover #mo_slide {
        color: black !important;
    }
</style>

<body>

    @include('landing_page.nav')

    @include('landing_page.nav')

    @include('landing_page.slide_image')

    @include('landing_page.smallSlide')


    {{-- Patient table Section --}}
    <div id="exTab1" class="container mt-5 pb-5">
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

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ session('error') }}</strong>
        </div>
        @endif

        <h3>All Patient</h3>

        <a href="{{ route('patient.register') }}" class="btn btn-primary btn-lg mt-4">Add Patient</a>

        <div class="tab-content clearfix ">
            <div class="tab-pane active mt-5">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">No.</th>
                                        <th style="background-color: #FAF9F6" scope="col">Profile</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Address</th>
                                        <th style="background-color: #FAF9F6" scope="col">Created Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Booking Hospital</th>
                                        <th style="background-color: #FAF9F6" scope="col">Doctor Conservation</th>
                                        <th style="background-color: #FAF9F6" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($patients as $key => $patient)
                                    <tr>
                                        <td scope="row">{{ $no }}</td>
                                        <td class=" text-center"><a href="{{ asset('profile/'.$patient->profile) }}" target="_blank"><img src="{{asset("profile/".$patient->profile)}}" width="40" height="40" alt="patient profile" style="border-radius:100%; border:1px solid black;"></a></td>
                                        <td>{{ $patient->name ?? "N/A"}}</td>
                                        <td>{{ $patient->phno ?? "N/A"}}</td>
                                        @foreach ($patientAddresses as $patientAddress)
                                        @if ($patientAddress->patient_id === $patient->id)
                                        <td>{{ $patientAddress->address ?? "N/A"}}</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center"><a href="{{url('/booking_req', $patient->id)}}" class="btn btn-secondary mb-2">Booking Hospital</a></td>
                                        <td class="text-center"><a href="{{url('/reason',$patient->id)}}" class="btn btn-info mb-2 text-white">Doctor Conservation</a></td>
                                        <td class="text-center">
                                            <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-success mb-2">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('patient.delete', $patient->id) }}" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete this Patient?')">
                                                <i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endforeach
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="/view_all_patient">view more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div id="exTab1" class="container mt-5 pb-5">
        <h3>MO Waiting List</h3>
        <div class="tab-content clearfix ">
            <div class="tab-pane active mt-5">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">No.</th>
                                        <th style="background-color: #FAF9F6" scope="col">Booking ID</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Description</th>
                                        <th style="background-color: #FAF9F6" scope="col">Order Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Call Patient</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($patient_records as $key => $patient_record)
                                    @if($patient_record->ticket_created == "no")
                                    <tr>
                                        <td scope="row">{{$no}}</td>
                                        <td>
                                            {{ $patient_record->booking_no }}
                                        </td>
                                        @foreach ($patients as $patient)
                                        @if ($patient->id == $patient_record->patient_id)
                                        <td>{{ $patient->name }}</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $patient_record->description }}</td>
                                        <td>{{ $patient_record->created_at->format('d-m-Y') }}</td>
                                        @if ($patient_record->date)
                                        <td>{{ $patient_record->date}}</td>
                                        @else
                                        <td class="text-danger">Appointment date မသတ်မှတ်ရသေးပါ။</td>
                                        @endif
                                        <td class="text-center">
                                            @if($patient_record->ticket_created == "no")
                                            <a href="{{url('/create_ticket',$patient_record->id)}}" class="btn btn-primary mb-2">Call Patient</a>
                                            @else

                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="{{url('view_all_booking_reason')}}">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Booking Request table Section --}}
    <div id="exTab1" class="container mt-5 pb-5">
        <h3>Booking Request</h3>
        <div class="tab-content clearfix ">
            <div class="tab-pane active mt-5">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">No.</th>
                                        <th style="background-color: #FAF9F6" scope="col">Booking ID</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Doctor Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Hospital Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Chief Complaint</th>
                                        <th style="background-color: #FAF9F6" scope="col">Ordered Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Appointment Date
                                        </th>
                                        <th style="background-color: #FAF9F6" scope="col">Token No.
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($bookings as $key => $booking)
                                    <tr>
                                        <td scope="row">{{$key + 1}}</td>
                                        <td>
                                            {{ $booking->booking_no }}
                                        </td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->doctor_name }}</td>
                                        <td>{{ $booking->hospital_name }}</td>
                                        <td>{{ $booking->description }}</td>
                                        <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            @if(!isset($booking->date))
                                            <form action="{{ route('update.booking',$booking->id) }}" method="POST">
                                                @csrf
                                                <div class="input-group col-md-12">
                                                    <input type="datetime-local" class="form-control" name="appointment_date" id="appointment_date" required />
                                                    <button class="btn btn-primary px-1 py-1" type="submit">Assign</button>
                                                </div>
                                            </form>
                                            @else
                                            {{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y / h:i A') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(!isset($booking->token_no))
                                            <form action="{{ route('token_no',$booking->id) }}" method="POST">
                                                @csrf
                                                <div class="input-group col-md-12">
                                                    <input type="type" class="form-control" name="token_no" id="token_no" required />
                                                    <button class="btn btn-primary px-1 py-1" type="submit">Assign</button>
                                                </div>
                                            </form>
                                            @else
                                            {{ $booking->token_no }}
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="{{url('view_all_booking')}}">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="exTab1" class="container mt-5 pb-5">

        <div class="">
            <ul style="border: 1px solid gray; border-radius:5px;" class="nav nav-pills nav-fill">
                <li class=" li active text-center" id="mo_li"><a class="tabs" href="#1a" data-toggle="tab" id="mo_slide">Incoming Patient</a></li>
                <li class="li text-center" id="mo_li"><a class="tabs" href="#2a" data-toggle="tab" id="mo_slide">MO Ongoing</a></li>
                <li class="li text-center" id="mo_li"><a class="tabs" href="#3a" data-toggle="tab" id="mo_slide">Hospital Ongoing</a></li>
                <li class="li text-center " id="mo_li"><a class="tabs" href="#4a" data-toggle="tab" id="mo_slide">Admin Review</a></li>
                <li class=" li text-center " id="mo_li"><a class="tabs com" href="#5a" data-toggle="tab" id="mo_slide">Completed</a></li>
            </ul>
        </div>

        <div class="tab-content clearfix">
            <div class="tab-pane active mt-5" id="1a">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">No.</th>
                                        <th style="background-color: #FAF9F6" scope="col">MO ID</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">ဆေးခန်းပြသလိုသော
                                            အကြောင်းအရာ</th>
                                        <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Call Patient</th>
                                        <th style="background-color: #FAF9F6" scope="col" class="text-center">
                                            Consultation</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @if(isset($tickets))
                                    @foreach ($tickets as $key => $ticket)
                                    @if ($ticket->called === "no")
                                    <tr>
                                        <td scope="row">{{$key + 1}}</td>
                                        <td>MO - {{$ticket->mo_id}}</td>
                                        <td>{{$ticket->patient_name ?? ""}}</td>
                                        <td>{{ $ticket->patient_phno }}</td>
                                        <td>{{$ticket->patient_complaint}} </td>
                                        <td>{{$ticket->appointment}}</td>
                                        <td><a href="{{url("call_patient",$ticket->id)}}" class="btn btn-primary">Next Stage</a></td>
                                        <td class="text-center">
                                            <a href="{{url("view_ticket",$ticket->id)}}" class="btn btn-success">View Ticket</a>
                                            <a href="{{url("edit_ticket",$ticket->id)}}" class="btn btn-warning">Edit Ticket</a>
                                            <a href="{{route('delete_ticket',$ticket->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Ticket?')">Delete</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endforeach
                                    @endif
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                            <div class="justify-content-end d-flex">
                                <a href="{{url('view_incoming_patient')}}">view more</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane mt-5" id="2a">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">Ticket No.</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Description</th>
                                        <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                        <th style="background-color: #FAF9F6" scope="col" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($tickets as $key => $ticket)
                                    @if ($ticket->called === "yes" && $ticket->assigned === "no")
                                    <tr>
                                        <td><a href="{{url("view_ticket",$ticket->id)}}" class="btn btn-primary">Ticket-{{$ticket->id}}</a></td>
                                        <td>{{$ticket->patient_name}}</td>
                                        <td>{{ $ticket->patient_phno }}</td>
                                        <td>{{$ticket->patient_complaint}} </td>
                                        <td>{{$ticket->created_at->format("d-m-Y")}}</td>
                                        <td class="text-center">
                                            @if ($ticket->ticket_stage == "BookingStageToHospital")
                                            <span class="text-danger fw-bold">Waiting for the hospital approval</span>
                                            @else
                                            <a href="{{url("assign",$ticket->id)}}" class="btn btn-primary">Assign Doctor</a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endif
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endforeach
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                            <div class="justify-content-end d-flex">
                                <a href="{{url('view_moongoing')}}">view more</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane mt-5" id="3a">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">Ticket No</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Dr.Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Hospital</th>
                                        <th style="background-color: #FAF9F6" scope="col">MO Remark</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($hospital_ongoings as $key => $h_ongoing)
                                    @if ( ($h_ongoing->ticket->assigned ?? "") == "yes" && !in_array($h_ongoing->ticket_stage, ["MoReviewStage", "CompleteStage"]))
                                    <tr>
                                        <td><a href="{{url("edit_ticket",$h_ongoing->ticket_id)}}" class="btn btn-primary">Ticket-{{$h_ongoing->ticket_id}}</a></td>
                                        <td>{{$h_ongoing->patient_name}}</td>
                                        <td>{{ $h_ongoing->phno }}</td>
                                        <td>
                                            @if ($h_ongoing->patient)
                                            <a href="{{ asset('profile/'.$h_ongoing->patient->profile) }}" target="_blank"><img src="{{asset("profile/".$h_ongoing->patient->profile)}}" width="30" height="30" alt="hospital profile" style="border-radius:100%; border:1px solid black;"></a>&nbsp;{{$h_ongoing->doctor_name}}
                                            @else
                                            {{$h_ongoing->doctor_name}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($h_ongoing->appointment_date)->format('d-m-Y / h:i A') }}</td>
                                        <td class="text-center">
                                            {{ $h_ongoing->hospital_names }}
                                        </td>
                                        <td class="text-center">
                                            {{$h_ongoing->mo_remark ?? "N/A"}}
                                        </td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="justify-content-end d-flex">
                                <a href="{{url('view_hospital_ongoing')}}">view more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane mt-5" id="4a">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="example1">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">Ticket No</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Description</th>
                                        <th style="background-color: #FAF9F6" scope="col">Completed Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Stage</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($tickets as $key => $ticket)
                                    @if ($ticket->assigned == "yes" && $ticket->ticket_stage == "MoReviewStage")
                                    <tr>
                                        <td><a href="{{url("edit_ticket",$ticket->id)}}" class="btn btn-primary">Ticket-{{$ticket->id}}</a></td>
                                        <td>{{$ticket->patient_name}}</td>
                                        <td>{{ $ticket->patient_phno}}</td>
                                        <td>{{$ticket->patient_complaint}} </td>
                                        <td>{{$ticket->updated_at->format("d-m-Y")}}</td>
                                        <td class="text-center">
                                            {{ $ticket->ticketStage->ticket_stage ?? "N/A" }}
                                        </td>
                                    </tr>
                                    @endif
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endforeach
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                            <div class="justify-content-end d-flex">
                                <a href="{{url("admin_review")}}">view more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane mt-5" id="5a">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="myTable">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">Ticket No</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Description</th>
                                        <th style="background-color: #FAF9F6" scope="col">Completed Date</th>
                                        <th style="background-color: #FAF9F6" scope="col">Medical Record</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($tickets as $key => $ticket)
                                    @if ($ticket->assigned === "yes" && $ticket->ticket_stage == "CompleteStage")
                                    <tr>
                                        <td><a href="{{url("view_ticket",$ticket->id)}}" class="btn btn-primary">Ticket-{{$ticket->id}}</a></td>
                                        <td>{{$ticket->patient_name}}</td>
                                        <td>{{ $ticket->patient_phno }}</td>
                                        <td>{{$ticket->patient_complaint}} </td>
                                        <td>{{$ticket->updated_at->format("d-m-Y")}}</td>
                                        <td><a href="{{url("medical_record",$ticket->id)}}" class="btn btn-primary">Medical Record</a></td>
                                    </tr>
                                    @endif
                                    @php
                                    $no++;
                                    @endphp
                                    @if ($no == 6)
                                    @break
                                    @endif
                                    @endforeach
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>

                        <div class="justify-content-end d-flex">
                            <a href="{{url("view_completed")}}">view more</a>
                        </div>
                    </div>
                </div>

            </div>
            <iframe id="map" class="mt-5" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15272.152786368106!2d96.09777651794431!3d16.874004943117995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1714551109428!5m2!1smy!2smm" style="border:0; width:100vw; height:450px; padding-bottom:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    </div>

    @include('landing_page.base')

    @include('landing_page.footer_section')
