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
    <!-- <link href="{{ asset('css/nivo-lightbox.css') }}" rel="stylesheet" /> -->
    <!-- <link href="{{ asset('css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen" /> -->
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" media="screen" />
    <!-- <link href="{{ asset('css/animate.css') }}" rel="stylesheet" /> -->
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
        /* font-size: 1.10rem; */
    }

    .modal,
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

        .modal,
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

<body>

    @include('landing_page.nav')

    {{-- Tabs with table Section --}}
    <div id="exTab1" class="container mt-5">

        <div class="tab-content clearfix ">
            <div style="margin-top: 5%">
                <div class="d-none d-md-block d-xl-none" style="height:60px;"></div>
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

                @if (session('phone'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ session('phone') }}</strong>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ session('error') }}</strong>
                </div>
                @endif
                <h1 class="mt-md-3 mt-lg-0">Hospital List</h1>
                <button id="openModal" class="btn btn-primary mt-5">Hospital Register</button>
            </div>
            <div id="modal" class="modal mt-lg-4 mt-xl-0">
                <div class="modal-content  rounded-4 ">
                    <div class="modal-header">
                        <h2>Hospital Registration</h2>
                        <!-- <span id="closeModal" class="close">&times;</span> -->
                    </div>
                    <form action="{{ url('hospital_register') }}" method="POST" class="mt-5 mb-2 mb-sm-0" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h4 style="text-decoration:underline;">Hospital Information</h4>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="hospital_name"> Name </label>
                                    <input type="text" class="form-control" id="hospital_name" name="hospital_name" placeholder="Enter Hospital Name" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="hospital_type">Type</label>
                                    <input type="text" class="form-control" id="hospital_type" name="hospital_type" placeholder="Enter Hospital Type" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="hospital_br_number">Bussiness Registration Number(If
                                        applicable)</label>
                                    <input type="text" class="form-control" id="hospital_br_number" name="hospital_br_number" placeholder="Enter Hospital Bussiness Registration number" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <h4 class="mt-3" style="text-decoration:underline;">Contact Information</h4>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="hospital_address">Address</label>
                                    <textarea name="hospital_address" id="hospital_address" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="hospital_phone_number">Phone Number</label>
                                    <input type="tel" class="form-control" id="hospital_phone_number" name="hospital_phone_number" placeholder="Enter Hospital phone number" required>
                                    @error('phone')
                                    <div class="error text-danger"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="hospital_email">Email Address</label>
                                    <input type="text" class="form-control" id="hospital_email" name="hospital_email" placeholder="Enter Hospital Email Address" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="hospital_image">Hospital Image</label>
                                    <input type="file" class="form-control" id="hospital_image" name="hospital_image" placeholder="Enter Hospital Image" required>
                                    @error('hospital_image')
                                    <div class="error text-danger"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="hospital_google_address_link">GPS Location Address</label>
                                <div class="input-group">
                                    <input type="hospital_google_address_link" class="form-control" id="hospital_google_address_link" name="hospital_google_address_link" placeholder="Enter Google Address Link">
                                    <button type="button" id="copyLinkBtn" class="btn btn-primary"> <i class="fa-solid fa-paperclip"></i></button>
                                </div>
                            </div>
                            @if (Auth::user()->type == 'mo' && Auth::user()->level == '1')
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                </div>
                            </div>
                            @endif
                        </div>

                        <hr>
                        <div class="row">
                            <h4 class="mt-3" style="text-decoration:underline;">Facility Details</h4>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="bed_capacity">Bed Capacity</label>
                                    <input type="number" class="form-control" id="bed_capacity" name="bed_capacity" placeholder="Enter bed capacity" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="facility_and_services">Facility & Services</label>
                                    <input type="text" class="form-control" id="facility_and_services" name="facility_and_services" placeholder="Enter facility and services" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="specialities">Specialities</label>
                                    <input type="text" class="form-control" id="specialities" name="specialities" placeholder="Enter Hospital specialities" required>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <h4 class="mt-3" style="text-decoration:underline;">Staff Information</h4>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="number_of_physicians">Number of Physicians </label>
                                    <input type="number" class="form-control" id="number_of_physicians" name="number_of_physicians" placeholder="Enter number of physicians" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="number_of_nurses">Number of Nurses</label>
                                    <input type="number" class="form-control" id="number_of_nurses" name="number_of_nurses" placeholder="Enter number of nurses" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="other_staff">Other Staff </label>
                                    <input type="text" class="form-control" id="other_staff" name="other_staff" placeholder="Enter other staff" required>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <h4 class="mt-3" style="text-decoration:underline;">Emergency Contact Information</h4>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="emergency_contact">Emergency Contact</label>
                                    <input type="tel" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="Enter emergency contact" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="emergency_services">Emergency Services</label>
                                    <input type="text" class="form-control" id="emergency_services" name="emergency_services" placeholder="Enter emergency services" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4 mb-sm-0">
                                <div class="">
                                    <buttton id="closeModal" class="btn btn-primary px-md-5 py-md-3">Back</buttton>
                                </div>
                                <div class="ms-5">
                                    <button type="submit" class="btn btn-primary px-md-5 py-md-3">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <div class="tab-pane active" style="margin-top: 6%">

                <div class="table-responsive" style="overflow-y: auto;">
                    <table class="table table-bordered " id="example-1">
                        <thead>
                            <tr>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">No.</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Profile</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Hospital
                                    Name
                                </th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Phone Number
                                </th>
                                <th style="background-color: #F0F3F8" scope="col " class="text-center">Address
                                </th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Google
                                    Address
                                    Link</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hospitals as $key => $hospital)
                            <tr>
                                <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                <td class=" text-center"><a href="{{ asset('profile/'.$hospital->image) }}" target="_blank"><img src="{{asset("profile/".$hospital->image)}}" width="40" height="40" alt="hospital profile" style="border-radius:100%; border:1px solid black;"></a></td>
                                <td class="text-center">{{ $hospital->hospital_name }}</td>
                                <td class="text-center">{{ $hospital->hospital_phone_number }}</td>

                                <td class="text-center">{{ $hospital->hospital_address }}</td>
                                <td class="text-center">{{ $hospital->hospital_google_address_link }}</td>
                                <td>
                                    <a href="{{ route('hospital.edit', $hospital->id) }}" class="btn btn-success mb-2">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <a href="{{ route('hospital.delete', $hospital->id) }}" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete this Hospital?')">
                                        <i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
                "pageLength": 10,
            });
        });
    </script>
    <script>
        const openModalButton = document.getElementById('openModal');
        const modal = document.getElementById('modal');
        const closeModalButton = document.getElementById('closeModal');

        openModalButton.addEventListener('click', () => {
            modal.style.display = 'block';
        });

        closeModalButton.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>

    <script>
        document.getElementById("copyLinkBtn").addEventListener("click", function() {
            var copyText = document.getElementById("hospital_google_address_link");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        });
    </script>
    @include('landing_page.footer_section')
