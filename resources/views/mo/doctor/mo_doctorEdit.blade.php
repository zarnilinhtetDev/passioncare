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
    #example-1_filter {
        text-align: left;

    }

    #example-1_info {
        text-align: left;
    }

    #example-1_paginate {
        text-align: left;
    }

    .card,
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

        .card,
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
                <h1>Doctor Edit</h1>
            </div>
            <div class="tab-pane active" style="margin-top: 5%">

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="card shadow col-md-10 col-lg-12 mb-3 mb-md-5 mb-lg-0">
                            <div class="card-body">
                                <form action="{{ route('updateDoctor', $doctors->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="doctor_name" class="">Doctor
                                                    Name</label>
                                                <input type="text" class="form-control" id="doctor_name" name="doctor_name" placeholder="Enter Doctor Name" value="{{ $doctors->doctor_name }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="medical_license">Medical License:</label>

                                                <input type="text" class="form-control" id="medical_license" name="medical_license" placeholder="Enter Medical License" value="{{ $doctors->medical_license }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_number">Phone Number:</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="{{ $doctors->phone_number }}" required>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" id="doctor_email" name="doctor_email" placeholder="Enter Email" value="{{ $doctors->doctor_email }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="degree">Degree:</label>

                                                <input type="text" class="form-control" id="degree" name="degree" placeholder="Enter Degree" value="{{ $doctors->degree }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nrc_number">NRC Number:</label>

                                                <input type="text" class="form-control" id="nrc_number" value="{{ $doctors->nrc_number }}" name="nrc_number" placeholder="Enter NRC Number" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="doctor_specialities">Specialities:</label>
                                                <input type="text" class="form-control" id="doctor_specialities" value="{{ $doctors->doctor_specialities }}" name="doctor_specialities" placeholder="Enter Specialities" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option>Select Gender</option>
                                                    <option value="male" @if ($doctors->gender === 'male') selected @endif>Male</option>
                                                    <option value="female" @if ($doctors->gender === 'female') selected @endif>Female
                                                    </option>
                                                    <option value="other" @if ($doctors->gender === 'other') selected @endif>Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="work_experiance">Work Experiance</label>

                                                <input type="text" class="form-control" id="work_experiance" value="{{ $doctors->work_experiance }}" name="work_experiance" placeholder="Enter Work Experiance" required>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City</label>

                                                <input type="text" class="form-control" id="city" value="{{ $doctors->city }}" name="city" placeholder="Enter City" required>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="other_certification">Other Certification</label>

                                                <input type="text" class="form-control" id="other_certification" value="{{ $doctors->other_certification }}" name="other_certification" placeholder="Enter Other Certification" required>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" name="address" id="address" cols="30" rows="5" placeholder="Enter Address">{{ $doctors->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Charges
                                                Fees:</label>
                                            <div class="form-group row">

                                                <div class="col">
                                                    <label for="doctor_charges_fees_from" class="">From</label>
                                                    <div class="">
                                                        <input type="number" class="form-control" id="doctor_charges_fees_from" name="doctor_charges_fees_from" value="{{ $doctors->from_fees }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="doctor_charges_fees_to" class="">To</label>
                                                    <div class="">
                                                        <input type="number" class="form-control" id="doctor_charges_fees_to" name="doctor_charges_fees_to" value="{{ $doctors->to_fees }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col mt-5">
                                                    <label for="doctor_charges_fees_to" class="">Profile Picture</label>
                                                    <div class="">
                                                        <input type="file" class="form-control" id="new_profile" name="new_profile">
                                                        <input type="hidden" name="old_profile" value="{{ $doctors->profile }}">
                                                        @error('new_profile')
                                                        <div class="error text-danger"><strong>{{ $message }}</strong></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <h2>Doctor Register</h2>
                                        <div class="row mt-2 table-responsive">
                                            <table id="flight_table" class="table table-bordered">
                                                <thead>
                                                    <tr class="item_header bg-gradient-directional-blue white">
                                                        <th class="text-center" style="width: 10%;">No.
                                                        </th>
                                                        <th class="text-center" style="width: 20%;">
                                                            Hospital Name
                                                        </th>
                                                        <th class="text-center" style="width: 20%;">Days
                                                        </th>
                                                        <th class="text-center" style="width: 20%;">Start Time
                                                        </th>
                                                        <th class="text-center" style="width: 20%;">End Time
                                                        </th>
                                                        <th class="text-center" style="width: 20%;">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($doctor2 as $key => $doctor)
                                                    <tr>
                                                        <td class="text-center"><input type='text' name='no[]' value="{{ $key + 1 }}" id="no-0" class="form-control text-center" autocomplete="off" readonly></td>
                                                        <td class="text-center"><select name='hospitalname[]' id="hospitalname-0" class="form-control" autocomplete="off" required>
                                                                <option value="" selected disabled>Select Hospital</option>
                                                                @foreach ($hospitals as $hospital)
                                                                <option value="{{ $hospital->hospital_name }}" @if($hospital->hospital_name == $doctor->hospitalname) selected @endif>
                                                                    {{ $hospital->hospital_name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <select name='day[]'' id="day-0" autocomplete="off" class="form-control">
                                                                <option value="" selected>Select Days</option>
                                                                <option value="Sunday" @if ($doctor->day == ' Sunday') selected @endif>Sunday</option>
                                                                <option value="Monday" @if ($doctor->day == 'Monday')
                                                                    selected
                                                                    @endif>Monday</option>
                                                                <option value="Tuesday" @if ($doctor->day == 'Tuesday')
                                                                    selected
                                                                    @endif>Tuesday</option>
                                                                <option value="Wednesday" @if ($doctor->day == 'Wednesday')
                                                                    selected
                                                                    @endif>Wednesday</option>
                                                                <option value="Thursday" @if ($doctor->day == 'Thursday')
                                                                    selected
                                                                    @endif>Thursday</option>
                                                                <option value="Friday" @if ($doctor->day == 'Friday')
                                                                    selected
                                                                    @endif>Friday</option>
                                                                <option value="Saturday" @if ($doctor->day == 'Saturday')
                                                                    selected
                                                                    @endif>Saturday</option>
                                                            </select>
                                                        </td>
                                                        <td class="text-center"><input type='time' name='start_time[]' value="{{ $doctor->start_time }}" id="start_time-0" class="form-control" autocomplete="off"></td>
                                                        <td class="text-center"><input type='time' name='end_time[]' value="{{ $doctor->end_time }}" class="form-control" id="end_time-0" autocomplete="off"></td>
                                                        <td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-md-flex justify-content-end">
                                                <button type="button" id="add_row" class="btn btn-success px-4">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center mb-4 mb-sm-0">
                                        <a href="{{ route('doctor') }}" class="btn btn-danger">Cancle</a>
                                        <button type="submit" id="add_row" class="btn btn-primary mx-5">Update</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#example-1').DataTable({
                "lengthChange": false,
                "searching": false
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var rowCount = 1; // Initialize row count
            let id_no = $("#flight_table tr").length;

            // let rowCount = $("#showitem123 tr").length;
            $('#add_row').click(function() {

                $.ajax({

                    type: 'GET',
                    url: "{{ route('get.part.data_hospital') }}",
                    data: {
                        // _token: "{{ csrf_token() }}",

                    },
                    success: function(data) {


                        var selectBox = document.getElementById("hospitalName-" + (rowCount - 1));


                        data.forEach(function(hospital) {

                            var option = document.createElement("option");

                            option.value = hospital.hospital_name;

                            option.text = hospital.hospital_name;

                            selectBox.appendChild(option);
                        });


                    },
                    error: function(error) {
                        console.error(error);
                    }
                });

                var html = '<tr>' +
                    '<td class="text-center"><input type="text" id="no-' + rowCount +
                    '" name="no[]" value="' + id_no +
                    '" class="form-control text-center" autocomplete="off" readonly></td>' +
                    '<td class="text-center"><select id="hospitalName-' + rowCount +
                    '" name="hospitalname[]" class="form-control" autocomplete="off"><option value="" selected disabled> Select Hospital</option></select></td>' +
                    '<td class="text-center"><select id="day-' + rowCount +
                    '" name="day[]" class="form-control" autocomplete="off"><option value="" selected> Select Days</option><option value="Sunday"> Sunday</option><option value="Monday"> Monday</option><option value="Tuesday"> Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday"> Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select></td>' +
                    '<td class="text-center"><input type="time" name="start_time[]" class="form-control" id="start_time-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="time" name="end_time[]" class="form-control" id="end_time-' +
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
