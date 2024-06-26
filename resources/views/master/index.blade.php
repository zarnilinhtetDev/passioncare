{{-- header --}}
@include('landing_page.header_section')
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
        font-family: 'Roboto' !important;
    }

    table>th,
    tr,
    td {
        font-size: 1.5rem !important;
    }

    .btn {
        padding: 0.50rem 1.3rem;
        font-size: 1.1rem;
    }

    @media only screen and (max-width:768px) {

        table th,
        tr,
        td {
            font-size: 1.2rem !important;
        }

        .btn {
            font-size: 0.9rem !important;
        }
    }

    .alert {
        display: none;
        background-color: #fff3cc;
        color: #000;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    #mo_li:hover #mo_slide {
        color: black !important;
    }
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        @include('landing_page.nav')

        @include('landing_page.slide_image')

        @include('landing_page.smallSlide')
        <!-- Section: boxes -->
        @if (Auth::user()->type == 'patient')
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong style="font-size:15px !important;">{{ session('success') }}</strong>
        </div>
        @endif

        @if (session('delete'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong style="font-size:15px !important;">{{ session('delete') }}</strong>
        </div>
        @endif


        <section class="mt-5">
            <div class="container mt-5">
                <div class="row d-flex flex-column flex-md-row align-items-center justify-content-center gap-2 gap-lg-0">
                    @if (!empty($patient))
                    <div class="wow-box">
                        <a href="{{ url('reason', $patient->id) }}" style="text-decoration: none;">
                            <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                                <i class="fa fa-check fa-3x text-white pb-3 pt-2"></i>
                                <div class="font pb-2 text-white fs-3" style="font-weight: bold;">ဆရာဝန်နဲ့
                                    တိုင်ပင်ဆွေးနွေးရန်</div>
                            </div>
                        </a>
                    </div>
                    <div class="wow-box">
                        <a href="{{ url('booking_req', $patient->id) }}" style="text-decoration: none;">
                            <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                                <i class="fa fa-list-alt fa-3x text-white pb-3 pt-2"></i>
                                <div class="font pb-2 text-white fs-3" style="font-weight: bold">ဆေးရုံဆေးခန်း
                                    ဘိုကင်တင်ရန်</div>
                            </div>
                        </a>
                    </div>
                    @if (isset($patient_record))
                    {{-- @foreach ($patient_records as $record) --}}
                    {{-- @if ($record->ticket_created != 'yes') --}}
                    <div class="card text-box mt-5">
                        <div class="card-body textboxText text-center lh-lg">
                            ဆရာဝန်နှင့် တိုင်ပင်ဆွေးနွေးရန် ချိန်းဆိုထားပါသည်။ <br>
                            သင်ရှေ့တွင် လူနာ ({{ $patient_record->waiting_qty ?? 0 }}) ဦးရှိပါသဖြင့်
                            ခန့်မှန်းကြာချိန် (0) နာရီ ({{ $patient_record->waiting_time ?? 0 }})
                            မိနစ်စောင့်ဆိုင်းရမည် ဖြစ်ပါသည်။ <br>
                            ဆရာဝန်မှ ဖုန်းဖြင့်ပြန်လည်ဆက်သွယ်ပေးမည်ဖြစ်ပါ၍
                            ခေတ္တစောင့်ဆိုင်းပေးပါရန်
                            အသိပေးအပ်ပါသည်။
                        </div>
                    </div>
                    {{-- @endif --}}
                    {{--@endforeach--}}
                    @endif
                    @endif
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="">
                        @if (empty($patient))
                        <div class="wow-box">
                            <a href="{{ url('reason', $patient->id) }}" style="text-decoration: none;">
                                <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                                    <i class="fa fa-check fa-3x text-white pb-3 pt-2"></i>
                                    <div class="font pb-2 text-white fs-3" style="font-weight: bold;">ဆရာဝန်နဲ့
                                        တိုင်ပင်ဆွေးနွေးရန်</div>
                                </div>
                            </a>
                        </div>
                        <div class="wow-box">
                            <a href="{{ url('booking_req', $patient->id) }}" style="text-decoration: none;">
                                <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                                    <i class="fa fa-list-alt fa-3x text-white pb-3 pt-2"></i>
                                    <div class="font pb-2 text-white fs-3" style="font-weight: bold">
                                        ဆေးရုံဆေးခန်း
                                        ဘိုကင်တင်ရန်</div>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
        </section>

        <div id="exTab1" class="container mt-5">

            <h3>Doctor Conservation</h3>

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
                                            <th style="background-color: #FAF9F6" scope="col">Ticket Info</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @if ($patient != null)
                                        @foreach ($patient_records as $key => $patient_record)
                                        <tr>
                                            <td scope="row">{{$key + 1}}</td>
                                            <td>
                                                {{ $patient_record->booking_no }}
                                            </td>
                                            @if ($patient->id == $patient_record->patient_id)
                                            <td>{{ $patient->name }}</td>
                                            @endif
                                            <td>{{ $patient_record->description }}</td>
                                            <td>{{ $patient_record->created_at->format('d-m-Y') }}</td>
                                            @if ($patient_record->date && ($patient_record->ticket && $patient_record->ticket->assigned == "yes"))
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($patient_record->date)->format('d-m-Y / h:m:s') }}
                                            </td>
                                            @else
                                            <td class="text-center text-danger fw-bold">Appointment date မသတ်မှတ်ရသေးပါ။</td>
                                            @endif
                                            <td><a href="{{route('ticketInfo',$patient_record->id)}}" class="btn btn-primary mb-2">View Info</a></td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @if($no == 6)
                                        @break
                                        @endif
                                        @endforeach
                                        @endif
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


        {{-- Tabs with table Section --}}
        <div id="exTab1" class="container mt-5">

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
                                            <th style="background-color: #FAF9F6" scope="col">Doctor Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Hospital Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Chief Complaint</th>
                                            <th style="background-color: #FAF9F6" scope="col">Ordered Date</th>
                                            <th style="background-color: #FAF9F6" scope="col">Appointment Date
                                            </th>
                                            <th style="background-color: #FAF9F6" scope="col">View Info</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @if ($patient != null)
                                        @foreach ($bookings as $key => $booking)
                                        <tr>
                                            <td scope="row">{{$key + 1}}</td>
                                            <td>
                                                {{ $booking->booking_no }}
                                            </td>
                                            <td>{{ $booking->doctor_name }}</td>
                                            <td>{{ $booking->hospital_name }}</td>
                                            <td>{{ $booking->description }}</td>
                                            <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($booking->date)
                                                {{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y / h:i A') }}
                                                @else
                                                <span class="text-center text-danger fw-bold">Appointment date မသတ်မှတ်ရသေးပါ။</span>
                                                @endif
                                            </td>
                                            <td><a href="{{route('viewInfo',$booking->id)}}" class="btn btn-primary mb-2">View Info</a></td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @if($no == 6)
                                        @break
                                        @endif
                                        @endforeach
                                        @endif
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
            <iframe id="map" class="mt-5" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15272.152786368106!2d96.09777651794431!3d16.874004943117995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1714551109428!5m2!1smy!2smm" style="border:0; width:100vw; height:450px; margin-bottom:10px; margin-top:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        @elseif(Auth::user()->type == 'hospital')
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
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Address</th>
                                            <th style="background-color: #FAF9F6" scope="col">Booking Hospital</th>
                                            <th style="background-color: #FAF9F6" scope="col">Doctor Conservation</th>
                                            <th style="background-color: #FAF9F6" scope="col">Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($patients as $key => $patient)
                                        <tr>
                                            <td scope="row">{{ $key + 1 }}</td>
                                            <td>{{ $patient->name }}</td>
                                            <td>{{ $patient->phno }}</td>
                                            @foreach ($patientAddresses as $patientAddress)
                                            @if ($patientAddress->patient_id === $patient->id)
                                            <td>{{ $patientAddress->address }}</td>
                                            @endif
                                            @endforeach
                                            <td class="text-center"><a href="{{url('/booking_req', $patient->id)}}" class="btn btn-secondary mb-2">Booking Hospital</a></td>
                                            <td class="text-center"><a href="{{url('/reason',$patient->id)}}" class="btn btn-info mb-2 text-white">Doctor Conservation</a></td>
                                            <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @if($no === 6)
                                        @break
                                        @endif
                                        @endforeach
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="justify-content-end d-flex">
                                <a href="{{route('hospital_view_all_patient')}}">view more</a>
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
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Ordered Date</th>
                                            <th style="background-color: #FAF9F6" scope="col">Appointment</th>
                                            <th style="background-color: #FAF9F6" scope="col">Token No</th>
                                            <th style="background-color: #FAF9F6" scope="col">Consulation</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($bookings as $key => $booking)
                                        @if ($booking->hospital_name === Auth::user()->name)
                                        <tr>
                                            <td scope="row">{{$no}}</td>
                                            <td>
                                                {{ $booking->booking_no }}
                                            </td>
                                            <td>{{ $booking->name }}</td>
                                            {{-- @foreach ($all_patients as $patient)
                                            @if ($patient->id == $booking->patient_id)
                                            <td>{{ $patient->phno }}</td>
                                            @endif
                                            @endforeach --}}
                                            <td>{{$booking->patient->phno}}</td>
                                            <td>{{ $booking->description }}</td>
                                            <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                @if(!isset($booking->date))
                                                <form action="{{ route('update.booking',$booking->id) }}" method="POST">
                                                    @csrf
                                                    <div class="input-group col-md-12">
                                                        <input type="date" class="form-control" name="appointment_date" id="appointment_date" required />
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
                                            <td><a href="{{route('viewInfo',$booking->id)}}" class="btn btn-primary mb-2">View Ticket</a></td>
                                        </tr>
                                        @endif
                                        @php
                                        $no++;
                                        @endphp
                                        @if($no == 6)
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
                    <li class=" li2 active text-center" id="mo_li"><a class="tabs com1" href="#1a" data-toggle="tab" id="mo_slide">Upcoming</a></li>
                    <li class="li2 text-center" id="mo_li"><a class="tabs gipsy" href="#2a" data-toggle="tab" id="mo_slide">Ongoing</a></li>
                    <li class=" li2 text-center " id="mo_li"><a class="tabs com" href="#3a" data-toggle="tab" id="mo_slide">Complete</a></li>
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
                                            <th style="background-color: #FAF9F6" scope="col">Ticket No.</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Dr.Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                            <!-- <th style="background-color: #FAF9F6" scope="col">Hospital</th> -->
                                            <th style="background-color: #FAF9F6" scope="col">Consulation</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($hospital_ongoings as $key => $hospital_ongoing)
                                        @if ($hospital_ongoing->called == "no")
                                        <tr>
                                            <td scope="row">{{$key + 1}}</td>
                                            <td><a href="{{url("view_ticket",$hospital_ongoing->ticket_id)}}" class="btn btn-primary">Ticket-{{$hospital_ongoing->ticket_id}}</a></td>
                                            <td>{{$hospital_ongoing->patient_name}}</td>
                                            <td>{{ $hospital_ongoing->phno }}</td>
                                            <td>{{$hospital_ongoing->ticket->patient_complaint}}</td>
                                            <td>
                                                @if ($hospital_ongoing->modoctor)
                                                <a href="{{ asset('profile/'.$hospital_ongoing->modoctor->profile) }}" target="_blank"><img src="{{asset("profile/".$hospital_ongoing->modoctor->profile)}}" width="30" height="30" alt="hospital profile" style="border-radius:100%; border:1px solid black;"></a>&nbsp;{{$hospital_ongoing->doctor_name}}
                                                @else
                                                {{$hospital_ongoing->doctor_name}}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($hospital_ongoing->ticket->appointment)->format('d-m-Y / h:m:s') }}</td>
                                            <td><a href="{{url("call_hospital_patient",$hospital_ongoing->id)}}" class="btn btn-primary">Accept</a></td>
                                        </tr>
                                        @endif
                                        @php
                                        $no++;
                                        @endphp
                                        @if($no == 6)
                                        @break
                                        @endif
                                        @endforeach
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                                <div class="justify-content-end d-flex">
                                    <a href="{{url('hospital_incoming_patient')}}">view more</a>
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
                                            <th style="background-color: #FAF9F6" scope="col">Dr.Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                            <th style="background-color: #FAF9F6" scope="col">Hospital</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Status</th>
                                            <!-- <th style="background-color: #FAF9F6" scope="col" class="text-center">Status</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($hospital_ongoings as $key => $hospital_ongoing)
                                        @if ($hospital_ongoing->called == "yes" && $hospital_ongoing->ticket_stage == "BookingStageToHospital" )
                                        <tr>
                                            <!-- <td scope="row">{{$key + 1}}</td> -->
                                            <td><a href="{{url("edit_ticket",$hospital_ongoing->ticket_id)}}" class="btn btn-primary">Ticket-{{$hospital_ongoing->ticket_id}}</a></td>
                                            <td>{{$hospital_ongoing->patient_name}}</td>
                                            <td>{{ $hospital_ongoing->phno }}</td>
                                            <td>
                                                @if ($hospital_ongoing->modoctor)
                                                <a href="{{ asset('profile/'.$hospital_ongoing->modoctor->profile) }}" target="_blank"><img src="{{asset("profile/".$hospital_ongoing->modoctor->profile)}}" width="30" height="30" alt="hospital profile" style="border-radius:100%; border:1px solid black;"></a>&nbsp;{{$hospital_ongoing->doctor_name}}
                                                @else
                                                {{$hospital_ongoing->doctor_name}}
                                                @endif
                                            </td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($hospital_ongoing->appointment_date)->format('d-m-Y / h:m:s') }}</td>
                                            <td>{{$hospital_ongoing->hospital_names}}</td>
                                            <td>{{$hospital_ongoing->ticket->patient_complaint}}</td>
                                            <td><a href="{{url("hospital_ongoing_complete",$hospital_ongoing->id)}}" class="btn btn-primary">Done</a></td>
                                        </tr>
                                        @endif
                                        @php
                                        $no++;
                                        @endphp
                                        @if($no == 6)
                                        @break
                                        @endif
                                        @endforeach
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                                <div class="justify-content-end d-flex">
                                    <a href="{{url('view_hospital_ongoing')}}">view more</a>
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
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Completed Date</th>
                                            <th style="background-color: #FAF9F6" scope="col">Medical Record</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($hospital_ongoings as $key => $hospital_ongoing)
                                        @if ($hospital_ongoing->ticket_stage == "MoReviewStage" || $hospital_ongoing->ticket_stage == "CompleteStage")
                                        <tr>
                                            <td><a href="{{url("view_ticket",$hospital_ongoing->ticket_id)}}" class="btn btn-primary">Ticket-{{$hospital_ongoing->ticket_id}}</a></td>
                                            <td>{{$hospital_ongoing->patient->name}}</td>
                                            <td>{{ $hospital_ongoing->patient->phno }}</td>
                                            <td>{{$hospital_ongoing->ticket->patient_complaint ?? "N/A"}} </td>
                                            @if ($hospital_ongoing->ticket)
                                            <td>{{$hospital_ongoing->ticket->updated_at->format("d-m-Y")}}</td>
                                            @else
                                            <td>N/A</td>
                                            @endif
                                            <td><a href="{{url("medical_record",$hospital_ongoing->ticket_id)}}" class="btn btn-primary">Medical Record</a></td>
                                        </tr>
                                        @endif
                                        @php
                                        $no++;
                                        @endphp
                                        @if($no == 6)
                                        @break
                                        @endif
                                        @endforeach
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                                <div class="justify-content-end d-flex">
                                    <a href="/hospital_completed">view more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe id="map" class="mt-5" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15272.152786368106!2d96.09777651794431!3d16.874004943117995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1714551109428!5m2!1smy!2smm" style="border:0; width:100vw; height:450px; padding-bottom:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    @endif

    </div>
    @include('landing_page.base')

    @include('landing_page.footer_section')

    <script>
        function showAlert() {
            var alertBox = document.getElementById("alertBox");
            alertBox.style.display = "block"; // Show the alert box
        };

        function hideAlert() {
            var alertBox = document.getElementById("alertBox");
            alertBox.style.display = "none"; // Hide the alert box
        }
    </script>
