<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PassionCare</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
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


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.1.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    #example-1_filter {
        text-align: left;

    }

    #example-1_info {
        text-align: left;
    }

    #example-1_paginate {
        text-align: left;
    }
</style>

<body>

    @include('landing_page.nav')

    {{-- Tabs with table Section --}}
    <div id="exTab1" class="container mt-5 mb-lg-5 px-0">

        <div class="tab-content clearfix ">
            <div style="margin-top: 5%">
                <h1 class="ms-3 ms-sm-0">Hospital Edit</h1>
            </div>
            <div class="" style="margin-top: 2%">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card shadow col-xl-10 mx-auto px-0 px-lg-2 pb-md-4">
                            <div class="card-body">
                                <form action="{{ route('hospital.update', $hospital->id) }}" method="POST"
                                    class="mt-5">
                                    @csrf
                                    <div class="row">
                                        <h4 style="text-decoration:underline;">Hospital Information</h4>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="hospital_name" class="mb-md-4 mb-lg-2"> Name </label>
                                                <input type="text" class="form-control" id="hospital_name"
                                                    name="hospital_name" value="{{ $hospital->hospital_name }}"
                                                    placeholder="Enter Hospital Name" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="hospital_type" class="mb-md-4 mb-lg-2">Type</label>
                                                <input type="text" class="form-control" id="hospital_type"
                                                    name="hospital_type" value="{{ $hospital->hospital_type }}"
                                                    placeholder="Enter Hospital Type" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="hospital_br_number" class="mb-md-0 mb-lg-2">Bussiness
                                                    Registration Number(If applicalbe)</label>
                                                <input type="text" class="form-control" id="hospital_br_number"
                                                    name="hospital_br_number"
                                                    value="{{ $hospital->hospital_br_number }}"
                                                    placeholder=" Enter Hospital Bussiness Registration number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h4 class="mt-3" style="text-decoration:underline;">Contact Information</h4>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="hospital_address">Address</label>
                                                <textarea name="hospital_address" id="hospital_address" class="form-control" rows="2">{{ $hospital->hospital_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="hospital_phone_number">Phone Number</label>
                                                <input type="tel" class="form-control" id="hospital_phone_number"
                                                    name="hospital_phone_number"
                                                    value="{{ $hospital->hospital_phone_number }}"
                                                    placeholder=" Enter Hospital phone number" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="hospital_email">Email Address</label>
                                                <input type="text" class="form-control" id="hospital_email"
                                                    name="hospital_email" value="{{ $hospital->hospital_email }}"
                                                    placeholder=" Enter Hospital Email Address" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 col-md-8">
                                            <label for="hospital_google_address_link">GPS Location Address</label>
                                            <div class="input-group">
                                                <input type="hospital_google_address_link" class="form-control"
                                                    id="hospital_google_address_link"
                                                    name="hospital_google_address_link"
                                                    value="{{ $hospital->hospital_google_address_link }}"
                                                    placeholder=" Enter Google Address Link">
                                                <button type="button" id="copyLinkBtn" class="btn btn-warning"> <i
                                                        class="fa-solid fa-paperclip"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <h4 class="mt-3" style="text-decoration:underline;">Facility Details</h4>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="bed_capacity">Bed Capacity</label>
                                                <input type="number" class="form-control" id="bed_capacity"
                                                    name="bed_capacity" value="{{ $hospital->bed_capacity }}"
                                                    placeholder=" Enter bed capacity" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="facility_and_services">Facility & Services</label>
                                                <input type="text" class="form-control" id="facility_and_services"
                                                    name="facility_and_services"
                                                    value="{{ $hospital->facility_and_services }}"
                                                    placeholder=" Enter facility and services" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="specialities">Specialities</label>
                                                <input type="text" class="form-control" id="specialities"
                                                    name="specialities" value="{{ $hospital->specialities }}"
                                                    placeholder=" Enter Hospital specialities" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <h4 class="mt-3" style="text-decoration:underline;">Staff Information</h4>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="number_of_physicians">Number of Physicians </label>
                                                <input type="number" class="form-control" id="number_of_physicians"
                                                    name="number_of_physicians"
                                                    value="{{ $hospital->number_of_physicians }}"
                                                    placeholder=" Enter number of physicians" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="number_of_nurses">Number of Nurses</label>
                                                <input type="number" class="form-control" id="number_of_nurses"
                                                    name="number_of_nurses" value="{{ $hospital->number_of_nurses }}"
                                                    placeholder=" Enter number of nurses" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="other_staff">Other Staff </label>
                                                <input type="text" class="form-control" id="other_staff"
                                                    name="other_staff" value="{{ $hospital->other_staff }}"
                                                    placeholder=" Enter other staff" required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <h4 class="mt-3" style="text-decoration:underline;">Emergency Contact
                                            Information</h4>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="emergency_contact">Emergency Contact</label>
                                                <input type="tel" class="form-control" id="emergency_contact"
                                                    name="emergency_contact"
                                                    value="{{ $hospital->emergency_contact }}"
                                                    placeholder="Enter emergency contact" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="emergency_services">Emergency Services</label>
                                                <input type="text" class="form-control" id="emergency_services"
                                                    name="emergency_services"
                                                    value="{{ $hospital->emergency_services }}"
                                                    placeholder="Enter emergency services" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-5 mb-md-0 d-flex align-items-center">
                                            <div class="col-6 d-flex justify-content-center">
                                                <a href="{{ route('hospital') }}" class="btn btn-primary px-5 py-3"
                                                    style="border-radius: 10px;">Back</a>
                                            </div>
                                            <div class="col-6 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary px-5  py-3"
                                                    style="border-radius: 10px;">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>

    @include('landing_page.footer_section')

</body>

</html>
<script>
    document.getElementById("copyLinkBtn").addEventListener("click", function() {
        var copyText = document.getElementById("hospital_google_address_link");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    });
</script>
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
