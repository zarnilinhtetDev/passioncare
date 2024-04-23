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
        margin: 15% auto;
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
</style>
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
    <div id="exTab1" class="container mt-5">

        <div class="tab-content clearfix ">
            <div style="margin-top: 5%">
                <h1>Doctor List</h1>
                <button id="openModal" class="btn btn-primary mt-5">Doctor Reigster</button>

                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span id="closeModal" class="close">&times;</span>
                        <h2>Doctor Register</h2>
                        <form action="" class="mt-5">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="doctor_name" class="col-sm-2 col-form-label">Doctor
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="doctor_name"
                                                name="doctor_name" placeholder="Search Doctor Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="specialities" class="col-sm-2 col-form-label">Specialities:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="specialities"
                                                name="specialities" placeholder="Search Specialities">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="hospital_name" class="col-sm-2 col-form-label">Hospital
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="hospital_name"
                                                name="hospital_name" placeholder="Search Hospital Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="city" class="col-sm-2 col-form-label">City/Township</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="Search City/Township">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-3 col-form-label">Charges
                                            Fees:</label>

                                        <label for="charges_fees_from" class="col-sm-1 col-form-label">From</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="charges_fees_from"
                                                name="charges_fees_from">
                                        </div>
                                        <label for="charges_fees_to" class="col-sm-1 col-form-label">To</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="charges_fees_to"
                                                name="charges_fees_to">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 justify-content-end d-flex" style="height: 20%">

                                    <button type="button" class="btn btn-primary">Save changes</button>

                                </div>
                            </div>


                        </form>

                    </div>
                </div>


                <div class="card shadow rounded-3" style="margin-top: 2%">
                    <div class="card-body ">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="doctor_name" class="col-sm-2 col-form-label">Doctor
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="doctor_name"
                                                name="doctor_name" placeholder="Search Doctor Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="specialities"
                                            class="col-sm-2 col-form-label">Specialities:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="specialities"
                                                name="specialities" placeholder="Search Specialities">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="hospital_name" class="col-sm-2 col-form-label">Hospital
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="hospital_name"
                                                name="hospital_name" placeholder="Search Hospital Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="city" class="col-sm-2 col-form-label">City/Township</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="Search City/Township">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-3 col-form-label">Charges
                                            Fees:</label>

                                        <label for="charges_fees_from" class="col-sm-1 col-form-label">From</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="charges_fees_from"
                                                name="charges_fees_from">
                                        </div>
                                        <label for="charges_fees_to" class="col-sm-1 col-form-label">To</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="charges_fees_to"
                                                name="charges_fees_to">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 justify-content-end d-flex" style="height: 20%">
                                    <button class="btn btn-primary ">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" style="margin-top: 6%">

                <div class="table-responsive" style="overflow-y: auto;">
                    <table class="table table-bordered " id="example-1">
                        <thead>
                            <tr>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">No.</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Dr.Name</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Specialities
                                </th>
                                <th style="background-color: #F0F3F8" scope="col " class="text-center">Experience
                                </th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Hospital
                                    Name</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Fees</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">TownShip
                                </th>
                                <th style="background-color: #F0F3F8;" scope="col" class="text-center">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="text-center">Dr.Saw Htoo</td>
                                <td class="text-center">Surgeon</td>

                                <td class="text-center">5 yrs</td>
                                <td class="text-center">OSC Hsp</td>
                                <td class="text-center">8000 ks</td>
                                <td class="text-center">Ygn</td>
                                <td class="text-center">

                                    <a href="{{ url('') }}" class="btn btn-primary btn-sm"><i
                                            class="fa-solid fa-eye"></i></a>

                                    <a href="{{ url('doctor_edit') }}" class="btn btn-success btn-sm"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    </div>

    @include('landing_page.footer_section')

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example-1').DataTable({
            "lengthChange": false,
            "searching": false
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
