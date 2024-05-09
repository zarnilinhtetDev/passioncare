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

<body>

    <!-- <body id="page-top" data-spy="scroll" data-target=".navbar-custom"> -->
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">

        @include('landing_page.nav')
        <div class="d-none d-md-block" style="height:60px;"></div>
        <section class="container-fluid mt-lg-5">
            <div class="row d-flex align-items-center justify-content-center pt-md-5 mt-xl-2 mb-lg-3 mb-xl-0">
                <div class="card shadow col-md-11 col-lg-10 mx-auto px-0 px-lg-2 pb-md-4">
                    <div class="card-title text-center mt-5">
                        <h2 class="fw-bold">Patient Edit</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('patient.update',$patient->id)}}" method="POST" class="">
                            @csrf
                            <div class="row">
                                <h4 style="text-decoration:underline;">Patient Information</h4>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="name" class=""> Name </label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$patient->name}}" placeholder="Enter Patient Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="phno" class="">Phone Number</label>
                                        <input type="text" class="form-control" id="phno" name="phno" value="{{$patient->phno}}" placeholder="Enter Patient Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="nrc" class="">NRC Number</label>
                                        <input type="text" class="form-control" id="nrc" name="nrc" value="{{$patient->nrc}}" placeholder=" Enter Patient NRC Number" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3"></div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="city" class="">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{$patientAddress->city}}" placeholder="Enter City" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label>Gender</label>
                                    <div class="row d-flex align-items-center">
                                        <div class="form-group col-4 d-flex align-items-center gap-2">
                                            <input type="radio" class="m-0 p-0" id="male" name="gender" value="Male" @if($patient->gender === 'Male') checked
                                            @endif >
                                            <label for="male" class="m-0 p-0">Male</label>
                                        </div>
                                        <div class="form-group col-4 d-flex align-items-center gap-2">
                                            <input type="radio" class="m-0 p-0" id="female" name="gender" value="Female" @if($patient->gender === 'Female') checked
                                            @endif >
                                            <label for="female" class="m-0 p-0">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="height" class="">Height(feet)</label>
                                        <input type="text" class="form-control" id="height" name="height" value="{{$initial->height}}" placeholder=" Enter Patient NRC Number" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="blood_type" class="">Blood Type</label>
                                        <input type="text" class="form-control" id="blood_type" name="blood_type" value="{{$initial->blood_type}}" placeholder=" Enter Blood Type" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="date_of_birth" class="">Date of Birth</label>
                                        <input type="text" class="form-control" id="dob" name="dob" value="{{$patient->dob}}" placeholder="Enter Date Of Birth" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" class="form-control" rows="5">{{$patientAddress->address}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row mt-4">
                                <h4 style="text-decoration:underline;">Emergency Information</h4>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="contact_name" class=""> Name </label>
                                        <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{$emergency->contact_name}}" placeholder="Enter Emergency contact Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="contact_number" class="">Contact Number</label>
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{$emergency->contact_number}}" placeholder="Enter Emergency Contact Number" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="contact_address">Address</label>
                                        <textarea name="contact_address" id="contact_address" class="form-control" rows="5">{{$emergency->contact_address}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="row mt-4">
                                <h4 style="text-decoration:underline;">Insurance Information</h4>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="company_name" class="">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{$insurance->company_name}}" placeholder=" Enter Insurance Company Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="company_contact_number" class="">Company Contact Number</label>
                                        <input type="text" class="form-control" id="company_contact_number" name="company_contact_number" value="{{$insurance->company_contact_number}}" placeholder="Enter Company Contact Number" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="company_address" class="">Company Address</label>
                                        <input type="text" class="form-control" id="company_address" name="company_address" value="{{$insurance->company_address}}" placeholder="Enter Company Address" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="medical_plan" class="">Medical Plan</label>
                                        <input type="text" class="form-control" id="medical_plan" name="medical_plan" value="{{$insurance->medical_plan}}" placeholder=" Enter Medical Plan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5 d-flex justify-content-end">
                                <div class="col-12 col-sm-4 col-lg-4 col-xl-3 mb-5 mb-md-0 d-flex align-items-center">
                                    <div class="col-6 d-flex justify-content-center">
                                        <a href="{{route('mo_home')}}" class="btn btn-primary px-5 py-3">Back</a>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary px-5 py-3">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </section>
    </div>

    <footer id="bottom-nav">
        <div class="bottom-nav" style="background-color: #337AB7">
            <a href="#">
                <i class="fas fa-home"></i>
                Home
            </a>
            <a href="#">
                <i class="fas fa-search"></i>
                Search
            </a>
            <a href="#">
                <i class="fas fa-plus"></i>
                Add
            </a>
            <a href="#">
                <i class="fas fa-heart"></i>
                Favorites
            </a>
            <a href="#">
                <i class="fas fa-user"></i>
                Profile
            </a>

            <a href="#" class="text-dark">
                {{-- <i class="fa fa-angle-up"> --}}
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
                "searching": false
            });
        });
    </script>
    @include('landing_page.footer_section')