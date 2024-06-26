<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.2/css/buttons.dataTables.min.css">
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

    table>th,
    td,
    tr {
        font-size: 1.5rem !important;
    }

    .card {
        font-size: 1.4rem !important;
    }

    .btn {
        padding: 0.50rem 1.3rem;
        font-size: 1.1rem;
    }


    @media only screen and (max-width:560px) {

        table>th,
        td,
        tr {
            font-size: 1.3rem !important;
        }

        .btn {
            font-size: 0.9rem !important;
        }

        .card {
            font-size: 1.2rem !important;
        }
    }
</style>

<body>

    @include('landing_page.nav')


    {{-- Tabs with table Section --}}
    <div id="exTab1" class="container mt-5">

        <div class="tab-content clearfix ">
            <div style="margin-top: 5%">
                <h1>Doctor List</h1>


                <div class="card shadow rounded-3 py-5 px-5 px-md-0 ps-md-5" style="margin-top: 2%">
                    <div class="card-body">
                        <form action="{{ url('doctor') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="doctor_name" class="col-sm-3 col-form-label">Doctor
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="doctor_name" name="doctor_name" placeholder="Search Doctor Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="doctor_specialities" class="col-sm-3 col-form-label">Specialities:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="doctor_specialities" name="doctor_specialities" placeholder="Search Specialities">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="hospital_name" class="col-sm-3 col-form-label">Hospital
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="hospital_name" name="hospitalname" placeholder="Search Hospital Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="city" class="col-sm-3 col-form-label">City/Township</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Search City/Township">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <label for="inputPassword" class="col-sm-3 col-form-label">Charges
                                            Fees:</label>

                                        <div class="col-sm-3">
                                            <label for="doctor_charges_fees_from" class="col-form-label">From</label>
                                            <input type="text" class="form-control" id="doctor_charges_fees_from" name="doctor_charges_fees_from">
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="doctor_charges_fees_to" class="col-form-label">To</label>
                                            <input type="text" class="form-control" id="doctor_charges_fees_to" name="doctor_charges_fees_to">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 mt-md-5 justify-content-end d-flex" style="height: 20%">
                                    <button type="submit" class="btn btn-primary ">Search</button>
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
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Profile</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Dr.Name</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Specialities
                                </th>
                                <th style="background-color: #F0F3F8" scope="col " class="text-center">Phone Number
                                </th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Hospital
                                    Name</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">From Fees</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">To Fees</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">TownShip
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $key => $doctor)
                            <tr>
                                <th class="text-center" scope="row">{{ $key + 1 }}</th>
                                <td class="text-center"><img src="{{asset("profile/".$doctor->profile)}}" width="40" height="40" alt="doctor profile" style="border-radius:100%; border:1px solid black;"></td>
                                <td class="text-center">{{ $doctor->doctor_name }}</td>
                                <td class="text-center">{{ $doctor->doctor_specialities }}</td>
                                <td class="text-center">{{ $doctor->phone_number }}</td>
                                <td class="text-center">
                                    @foreach ($doctor->modoctor2s as $doc)
                                    {{ $doc->hospitalname }} <br>
                                    @endforeach
                                </td>
                                <td class="text-center">{{ $doctor->from_fees }}</td>
                                <td class="text-center">{{ $doctor->to_fees }}</td>
                                <td class="text-center">{{ $doctor->city }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mb-5">

                    </div>
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

    @include('landing_page.footer_section')

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#example-1').DataTable({
            "lengthChange": false,
            "searching": false,
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
    $(document).ready(function() {
        var rowCount = 1; // Initialize row count
        let id_no = 2;
        $('#add_row').click(function() {
            var html = '<tr>' +
                '<td class="text-center"><input type="text" id="no-' + rowCount +
                '" name="no[]" value="' + id_no +
                '" class="form-control" autocomplete="off" readonly></td>' +
                '<td class="text-center"><input type="text" id="hospitalName-' + rowCount +
                '" name="hospitalname[]" class="form-control" autocomplete="off"></td>' +
                '<td class="text-center"><input type="date" name="date[]" class="form-control" id="date-' +
                rowCount + '" autocomplete="off"></td>' +
                '<td class="text-center"><input type="text" name="time[]" class="form-control" id="time-' +
                rowCount + '" autocomplete="off"></td>' +
                '<td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button></td>' +
                '</tr>';
            $('#flight_table tbody').append(html);
            rowCount++; // Increment row count
            id_no++;
        });

        $(document).on('click', '.remove_row', function() {
            $(this).closest('tr').remove();
            id_no--;
        });
    });
</script>