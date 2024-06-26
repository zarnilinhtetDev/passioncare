@include('landing_page.header_section')
<style>
    .card {
        font-size: 1.5rem !important;
    }

    input,
    select,
    textarea {
        font-size: 15px !important;
    }

    .btn {
        font-size: 13px !important;
    }

    @media (max-width: 768px) {

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

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" class="bg-light">

    <div id="wrapper" style=" font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        @include('landing_page.nav')


        <div id="exTab1" class="container">
            <div class="tab-content clearfix  ">
                <div style="margin-top: 5%">
                    <div class="d-none d-lg-block" style="height:20px !important;"></div>
                    <section class="card shadow">
                        <div class="row justify-content-center my-3 px-4">
                            <form class="form-group" action="{{ url('profile_update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h2 class="text-center my-4">Personal Information</h2>
                                <div class="row mt-4">
                                    <div class="col-12 col-md-4 mt-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name ?? Auth::user()->name }}">
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <label for="name">Phone Number</label>
                                        <input type="text" class="form-control" id="phno" name="phno" value="{{ $patient->phno ?? Auth::user()->phno }}">
                                        @error('phno')
                                        <div class="error text-danger"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <label for="name">NRC Number</label>
                                        <input type="text" class="form-control" id="nrc" name="nrc" value="{{ $patient->nrc ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4 mt-3">
                                        <label for="name">Date Of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="{{ $patient->dob ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="name">Gender</label>
                                        <div class="col-md-12">
                                            @if (!empty($patient))

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="male" @if($patient->gender == 'Male') checked @endif value="Male">
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female" @if($patient->gender == 'Female') checked @endif value="Female">
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                            @else
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="name">Height</label>
                                        <input type="text" class="form-control" id="height" name="height" value="{{ $initial->height ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4 mt-3">
                                        <label for="name">Blood Type</label>
                                        <input type="text" class="form-control" id="blood_type" name="blood_type" value="{{ $initial->blood_type ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="weight">Weight</label>
                                        <input type="text" class="form-control" id="weight" name="weight" value="{{ $initial->weight ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="bmi">BMI</label>
                                        <input type="text" class="form-control" id="bmi" name="bmi" value="{{ $initial->bmi ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4 mt-3">
                                        <label for="name">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ $p_address->city ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{ $p_address->state ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6 mt-3">
                                        <label for="name">Address</label>
                                        <textarea class="form-control" id="address" name="address" row="2">{{ $p_address->address ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="new_profile">Profile</label>
                                        <input type="file" class="form-control" id="new_profile" name="new_profile">
                                        <input type="hidden" class="form-control" id="old_profile" name="old_profile" value="{{$patient->profile}}">
                                        @error('profile')
                                        <div class="error text-danger"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class=" col-md-12 form-title mt-5">
                                        <h3 class="text-secondary">Emergency Informations</h3>
                                        <hr>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4 mt-3">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="contact_name" value="{{ $emergency->contact_name ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="name">Contact Number</label>
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $emergency->contact_number ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="name">Address</label>
                                        <textarea class="form-control" id="contact_address" name="contact_address" row="2">{{ $emergency->contact_address ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class=" col-md-12 form-title mt-5">
                                        <h3 class="text-secondary">Insurance Information</h3>
                                        <hr>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3 mt-3">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $insurance->company_name ?? '' }}">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="name">Company Contact Number</label>
                                        <input type="text" class="form-control" id="company_contact_number" name="company_contact_number" value="{{ $insurance->company_contact_number ?? '' }}">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="name">Medical Plan</label>
                                        <input type="text" class="form-control" id="medical_plan" name="medical_plan" value="{{ $insurance->medical_plan ?? '' }}"></inpu>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="name">Company Address</label>
                                        <textarea class="form-control" id="company_address" name="company_address" row="">{{ $insurance->company_address ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mr-auto d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary mx-4">Update</button>
                                    <a href="{{ url('patientProfile') }}" class="btn btn-primary px-4">Back</a>
                                </div>
                                <div class=" mt-5">

                                </div>
                            </form>
                        </div>
                    </section>

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
</body>
@include('landing_page.footer_section')
