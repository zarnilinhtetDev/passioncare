@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">

        @include('landing_page.nav')

        <section class="container-fluid container-xl pt-lg-5 pb-5">
            <div class="row px-md-5 my-md-5" style="font-size: 14px !important;">
                <div class="col-12 mt-5">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between mb-5">
                        <div class="">
                            <h1>Hospital Profile</h1>
                        </div>
                        <div class="" style="float: right;">
                            <a href="{{route('hospitalEdit',$hospital->id)}}" class="btn-lg btn-primary text-decoration-none">Edit</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="row">
                                <h2 class="mb-3">Hospital Information</h2>
                            </div>
                            <div class="card shadow" style="width: 100%">
                                <div class="row px-lg-1 py-5">
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-center">

                                        @if ($hospital->image)
                                        <img src="{{asset('profile/'.$hospital->image)}}" alt="hospital profile" width="150" height="150" style="border-radius: 50%;border:1px solid #337AB7;">
                                        @else
                                        <img src="{{asset('img/doctor1.png')}}" alt="" width="150" height="150" style="border-radius: 50%;border:1px solid #337AB7;">
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Name : </h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->hospital_name}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Business Registration Number (If applicable ) : </h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->hospital_br_number}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Type : </h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->hospital_type}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <h2 class="mb-3">Contact Information</h2>
                            </div>
                            <div class="card shadow" style="width: 100%">
                                <div class="row px-lg-1 py-5">
                                    <div class="col-12">
                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Address : </h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->hospital_address}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Phone Number :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0"> {{$hospital->hospital_phone_number}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Email Address :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0"> {{$hospital->hospital_email}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">GPS Location Address : </h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->hospital_google_address_link}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="row">
                                    <h2 class="mb-3">Staff Information</h2>
                                </div>
                                <div class="card shadow" style="width: 100%">
                                    <div class="row px-lg-1 py-5">
                                        <div class="col-12">
                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Number of Physicians :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$hospital->number_of_physicians}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Number of Nurses :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$hospital->number_of_nurses}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Other Staff :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$hospital->other_staff}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mt-md-0">
                            <div class="row">
                                <h2 class="mb-3">Facility Details</h2>
                            </div>
                            <div class="card shadow">
                                <div class="row px-lg-1 py-5">
                                    <div class="col-12">
                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Bed Capacity :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->bed_capacity}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Facility and Service :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->facility_and_services}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Specialities :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$hospital->specialities}}</h5>
                                            </div>
                                        </div>

                                        <!-- <div class="row px-4 px-lg-5" style="visibility: hidden;">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Emergency Services :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0"></h5>
                                            </div>
                                        </div> -->

                                        <div class="d-none d-md-block d-lg-none" style="height:80px !important;"></div>
                                        <div class="d-none d-lg-block d-xl-none" style="height:60px !important;"></div>
                                        <div class="d-none d-xl-block" style="height:45px !important;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <div class="row">
                                    <h2 class="mb-3">Emergency Contact Information</h2>
                                </div>
                                <div class="card shadow">
                                    <div class="row px-lg-1 py-5">
                                        <div class="col-12">
                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Emergency Contact :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$hospital->emergency_contact}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Emergency Services :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$hospital->emergency_services}}</h5>
                                                </div>
                                            </div>

                                            <!-- <div class="row px-4 px-lg-5" style="visibility: hidden;">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Emergency Services :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0"></h5>
                                                </div>
                                            </div> -->
                                            <div class="d-none d-md-block d-lg-none" style="height:60px !important;"></div>
                                            <div class="d-none d-lg-block" style="height:50px !important;"></div>
                                        </div>
                                    </div>
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
</body>

@include('landing_page.footer_section')
