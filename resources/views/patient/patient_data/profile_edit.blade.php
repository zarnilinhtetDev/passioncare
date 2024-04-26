@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" class="bg-light">

    <div id="wrapper" style=" font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        @include('landing_page.nav')


        <div id="exTab1" class="container">
            <div class="tab-content clearfix  ">
                <div style="margin-top: 5%">

                    <section class="card shadow">
                        <div class="row col-md-12 justify-content-center my-3">
                            <form class="form-group" action="{{ url('profile_update', Auth::user()->id) }}" method="post">
                                @csrf
                                <h3 class="text-center my-4">Personal Information</h3>
                                <div class="col-md-4 mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name ?? Auth::user()->name }}">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="name">Phone Number</label>
                                    <input type="text" class="form-control" id="phno" name="phno" value="{{ $patient->phno ?? '' }}">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="name">NRC Number</label>
                                    <input type="text" class="form-control" id="nrc" name="nrc" value="{{ $patient->nrc ?? '' }}">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="name">Date Of Birth</label>
                                    <input type="text" class="form-control" id="dob" name="dob" value="{{ $patient->dob ?? '' }}">
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
                                <div class="col-md-4 mt-3">
                                    <label for="name">Blood Type</label>
                                    <input type="text" class="form-control" id="blood_type" name="blood_type" value="{{ $initial->blood_type ?? '' }}">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="name">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $p_address->city ?? '' }}">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="name">Address</label>
                                    <textarea class="form-control" id="address" name="address" row="2">{{ $p_address->address ?? '' }}</textarea>
                                </div>



                                <div class=" col-md-12 form-title mt-5">
                                    <h3 class="text-secondary">Emergency Informations</h3>
                                    <hr>
                                </div>


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
                                <div class=" col-md-12 form-title mt-5">
                                    <h3 class="text-secondary">Insurance Information</h3>
                                    <hr>
                                </div>
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


                                <div class="col-md-12 mr-auto d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary mx-4">Update</button>
                                    <a href="{{ url('profile') }}" class="btn btn-primary ">Back</a>
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
    <div class="bottom-nav" style="background-color: #337AB7; position:fixed; bottom:0; width:100%; z-index: 1000; height:3%" id="bottom-nav">
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
</body>
@include('landing_page.footer_section')
