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

    .btn {
        padding: 0.50rem 1.3rem;
        font-size: 1.10rem;
    }

    a {
        text-decoration: none;
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
                                        <th style="background-color: #FAF9F6" scope="col">Created Date</th>
                                        <th style="background-color: #FAF9F6" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
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
                                        <td>{{ $patient->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-success mb-2">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('patient.delete', $patient->id) }}" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete this Patient?')">
                                                <i class="fa-solid fa-trash"></i></a>
                                            <a href="#" class="btn btn-primary mb-2">Create Ticket</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="">view more</a>
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
                                        <th style="background-color: #FAF9F6" scope="col">MO ID</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">ဆေးခန်းပြသလိုသော
                                            အကြောင်းအရာ</th>
                                        <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                        <th style="background-color: #FAF9F6" scope="col" class="text-center">
                                            Consultation</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Agent 1</td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09-754239736</td>
                                        <td>Lorem Ipsum is a type of placeholder </td>
                                        <td>22-02-24</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-success">View Ticket</a>
                                            <a href="#" class="btn btn-warning">Edit Ticket</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Agent 2</td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09-754239736</td>
                                        <td>Lorem Ipsum is a type of placeholder </td>
                                        <td>22-02-24</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-success">View Ticket</a>
                                            <a href="#" class="btn btn-warning">Edit Ticket</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Agent 3</td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09-754239736</td>
                                        <td>Lorem Ipsum is a type of placeholder </td>
                                        <td>22-02-24</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-success">View Ticket</a>
                                            <a href="#" class="btn btn-warning">Edit Ticket</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->

                                </tbody>
                            </table>
                        </div>
                        <div class="justify-content-end d-flex">
                            <a href="">view more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="exTab1" class="container mt-5 pb-5">

        <div class="">
            <ul style="border: 1px solid gray; border-radius:5px;" class="nav nav-pills nav-fill">
                <li class=" li active text-center" id="mo_li"><a class="tabs" href="#1a" data-toggle="tab" id="mo_slide" style="">Incoming Patient</a></li>
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
                                        <th style="background-color: #FAF9F6" scope="col">No</th>
                                        <th style="background-color: #FAF9F6" scope="col">MO ID</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Description</th>
                                        <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                        <th style="background-color: #FAF9F6" scope="col" class="text-center">
                                            Consultation</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Agent 1</td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09-754239736</td>
                                        <td>Lorem Ipsum is a type of placeholder </td>
                                        <td>22-02-24</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary"> Call Patient </a>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>

                        <div class="justify-content-end d-flex">
                            <a href="">view more</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane mt-5" id="2a">
                <div class="card shadow" style="background-color: #F0F5F9">
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto;">
                            <table class="table table-bordered table-striped mt-5" id="myTable1">
                                <thead class="thead">
                                    <tr>
                                        <th style="background-color: #FAF9F6" scope="col">Ticket No</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Description</th>
                                        <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                        <th style="background-color: #FAF9F6" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary button" type="button">Ticket
                                                1</button>
                                        </td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09123456789</td>
                                        <td>Lorem Ipsum is a type of placeholder </td>
                                        <td>22-02-24</td>
                                        <td>
                                            Assign MO
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="justify-content-end d-flex">
                                <a href="">view more</a>
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
                                        <th style="background-color: #FAF9F6" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary button" type="button">Ticket
                                                1</button>
                                        </td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09123456789</td>
                                        <td>Dr. Naing Zaw</td>
                                        <td>22-02-24</td>
                                        <td>
                                            Assign MO
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="justify-content-end d-flex">
                                <a href="">view more</a>
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

                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary button" type="button">Ticket
                                                1</button>
                                        </td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09123456789</td>
                                        <td>Lorem Ipsum is a type of placeholder</td>
                                        <td>22-02-24</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="justify-content-end d-flex">
                                <a href="">view more</a>
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
                                        <th style="background-color: #FAF9F6" scope="col">No</th>
                                        <th style="background-color: #FAF9F6" scope="col">MO ID</th>
                                        <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                        <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                        <th style="background-color: #FAF9F6" scope="col">Description</th>
                                        <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                        <th style="background-color: #FAF9F6" scope="col" class="text-center">
                                            Consultation</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Agent 1</td>
                                        <td>U Kyaw Kyaw Win</td>
                                        <td>09-754239736</td>
                                        <td>Lorem Ipsum is a type of placeholder </td>
                                        <td>22-02-24</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary"> Call Patient </a>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>

                        <div class="justify-content-end d-flex">
                            <a href="">view more</a>
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

    {{-- <style>
    @media only screen and (max-width:768px) {

    }
</style> --}}