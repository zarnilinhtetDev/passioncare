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
</style>

<body>

    @include('landing_page.nav')

    {{-- Tabs with table Section --}}
    <div id="exTab1" class="container mt-5">

        <div class="tab-content clearfix ">
            <div class="d-none d-md-block d-xl-none" style="height:60px;"></div>
            <div style="margin-top: 5%">
                <h1>Doctor List</h1>
                <button id="openModal" class="btn btn-primary mt-5">Doctor Reigster</button>

                <div id="modal" class="modal">
                    <div class="d-none d-md-block d-2xl-none" style="height:60px;"></div>
                    <div class="modal-content  rounded-4">
                        <div class="modal-header">
                            <h2>Doctor Register</h2>
                        </div>
                        <form action="{{ url('doctor_register') }}" method="POST" class="mt-5">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doctor_name" class="">Doctor
                                            Name</label>
                                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" placeholder="Enter Doctor Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="medical_license">Medical License:</label>

                                        <input type="text" class="form-control" id="medical_license" name="medical_license" placeholder="Enter Medical License" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number:</label>

                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="degree">Degree:</label>

                                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Enter Degree" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nrc_number">NRC Number:</label>

                                        <input type="text" class="form-control" id="nrc_number" name="nrc_number" placeholder="Enter NRC Number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doctor_specialities">Specialities:</label>
                                        <input type="text" class="form-control" id="doctor_specialities" name="doctor_specialities" placeholder="Enter Specialities" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="work_experiance">Work Experiance</label>

                                        <input type="text" class="form-control" id="work_experiance" name="work_experiance" placeholder="Enter Work Experiance" required>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>

                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="other_certification">Other Certification</label>

                                        <input type="text" class="form-control" id="other_certification" name="other_certification" placeholder="Enter Other Certification" required>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" cols="30" rows="5" placeholder="Enter Address"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="inputPassword">Charges
                                        Fees:</label>
                                    <div class="form-group row">

                                        <div class="col">
                                            <label for="doctor_charges_fees_from" class="">From</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="doctor_charges_fees_from" name="doctor_charges_fees_from">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="doctor_charges_fees_to" class="">To</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="doctor_charges_fees_to" name="doctor_charges_fees_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="">
                                <h2>Work Detail</h2>
                                <div class="row mt-2 table-responsive">
                                    <table id="flight_table" class="table table-bordered">
                                        <thead>
                                            <tr class="item_header bg-gradient-directional-blue white">
                                                <th class="text-center" style="width: 10%;">No.
                                                </th>
                                                <th class="text-center" style="width: 20%;">
                                                    Hospital Name
                                                </th>
                                                <th class="text-center" style="width: 20%;">Date
                                                </th>
                                                <th class="text-center" style="width: 20%;">Time
                                                </th>
                                                <th class="text-center" style="width: 20%;">Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><input type='text' name='no[]' value="1" id="no-0" class="form-control text-center" autocomplete="off" readonly>
                                                </td>
                                                <td class="text-center"><input type='text' name='hospitalname[]' id="hospitalname-0" class="form-control" autocomplete="off">
                                                </td>
                                                <td class="text-center"><input type='date' name='date[]' id="date-0" class="form-control" autocomplete="off"></td>
                                                <td class="text-center"><input type='text' name='time[]' class="form-control" id="time-0" autocomplete="off"></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <div class="d-md-flex justify-content-end">
                                        <button type="button" id="add_row" class="btn btn-success px-4">Add</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <div class="">
                                    <buttton id="closeModal" class="btn btn-primary px-md-5 py-md-3">Back
                                    </buttton>
                                </div>
                                <button type="submit" id="add_row" class="btn btn-primary mx-5">Register</button>
                            </div>
                        </form>

                    </div>
                    <div class="d-block d-sm-none" style="height:50px !important;"></div>
                </div>


                <div class="card shadow rounded-3" style="margin-top: 2%">
                    <div class="card-body ">
                        <form action="{{ route('mo_doctor_search') }}" method="POST">
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

                                        <label for="doctor_charges_fees_from" class="col-sm-1 col-form-label">From</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="doctor_charges_fees_from" name="doctor_charges_fees_from">
                                        </div>
                                        <label for="doctor_charges_fees_to" class="col-sm-1 col-form-label">To</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="doctor_charges_fees_to" name="doctor_charges_fees_to">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 justify-content-end d-flex" style="height: 20%">
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
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Dr.Name</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Specialities
                                </th>
                                <th style="background-color: #F0F3F8" scope="col " class="text-center">Phone Number
                                </th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Hospital
                                    Name</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">From Fees
                                </th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">To Fees</th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">TownShip
                                </th>
                                <th style="background-color: #F0F3F8" scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $key => $doctor)
                            <tr>
                                <th class="text-center" scope="row">{{ $key + 1 }}</th>
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
                                <td class="text-center">
                                    <a href="{{ route('doctorDetail', $doctor->id) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('doctor#doctor_edit', $doctor->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('doctor#deleteDoctor', $doctor->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Doctor?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block d-sm-none" style="height:50px !important;"></div>
            </div>
        </div>
    </div>

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

            {{-- <a href="#" class="text-dark">
                <i class="fa fa-angle-up">
                    <i class="fa fa-arrow-up"></i>
            </a> --}}

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
                '" class="form-control text-center" autocomplete="off" readonly></td>' +
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