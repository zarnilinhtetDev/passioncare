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
</style>

<body>



    @include('landing_page.nav')


    {{-- Tabs with table Section --}}
    <div id="exTab1" class="container mt-5">

        <div class="tab-content clearfix ">
            <div style="margin-top: 5%">
                <h1>Hospital List</h1>
                <button id="openModal" class="btn btn-primary mt-5">Hospital Reigster</button>
            </div>
            <div id="modal" class="modal">
                <div class="modal-content  rounded-4">
                    <div class="modal-header">
                        <h2>Hospital Register</h2>
                        <span id="closeModal" class="close">&times;</span>
                    </div>
                    <form action="{{ url('hospital_register') }}" method="POST" class="mt-5">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hospital_name">Hospital
                                        Name</label>

                                    <input type="text" class="form-control" id="hospital_name" name="hospital_name"
                                        placeholder="Enter Hospital Name" required>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hospital_phone_number">Phone
                                        Number</label>

                                    <input type="tel" class="form-control" id="hospital_phone_number"
                                        name="hospital_phone_number" placeholder="Enter Phone Number" required>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hospital_address">Address</label>

                                    {{-- <input type="address" class="form-control" id="hospital_address"
                                        name="hospital_address" placeholder="Enter Address"> --}}
                                    <textarea name="hospital_address" id="hospital_address" class="form-control" cols="30" rows="5"></textarea>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hospital_google_address_link" class="form-control"
                                        id="hospital_google_address_link" name="hospital_google_address_link"
                                        placeholder="Enter Google Address Link">
                                    <button type="button" id="copyLinkBtn" class="btn btn-warning mt-2"> <i
                                            class="fa-solid fa-paperclip"></i></button>


                                </div>
                            </div>



                            <div class="justify-content-end d-flex" style="height: 20%">

                                <button type="submit" class="btn btn-primary">Save changes</button>
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


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hospitals as $key => $hospital)
                                <tr>
                                    <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                    <td class="text-center">{{ $hospital->hospital_name }}</td>
                                    <td class="text-center">{{ $hospital->hospital_phone_number }}</td>

                                    <td class="text-center">{{ $hospital->hospital_address }}</td>
                                    <td class="text-center">{{ $hospital->hospital_google_address_link }}</td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    </div>

    <div id="bottom-nav">
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

            {{-- <a href="#" class="text-dark">
                <i class="fa fa-angle-up">
                    <i class="fa fa-arrow-up"></i>
            </a> --}}

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
            "pageLength": 10
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
