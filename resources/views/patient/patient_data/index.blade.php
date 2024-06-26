@include('landing_page.header_section')
<style>
    table tr,th, td, input,select,textarea{
        font-size: 1.5rem !important;
    }
    .btn{
        font-size: 13px !important;
    }
    @media (max-width: 768px){
        table tr,th, td, input,select,textarea{
            font-size: 13px !important;
        }
        .btn{
            font-size: 11px !important;
        }
    }
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" class="bg-light">
    <div id="wrapper" style=" font-family: Arial, Helvetica, sans-serif;">

        @include('landing_page.nav')
        <div style="height: 150px" class="d-none d-lg-block"></div>
        <div class="container d-flex align-items-center justify-content-center mt-md-5">
            <section class="container">
                <div class="row" style="height: auto;">
                    <div class="col-12 col-md-6 d-flex justify-content-center mt-4">
                        <div class="card shadow" style="width: 100%;">
                            <div class="cade-header row mt-5">
                                <div class="col-md-1 "></div>
                                <h1 class="cade-title col ms-3 ms-md-0">Personal Information</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-center">
                                        <div class="d-flex justify-content-start mb-4">
                                            @if(auth()->user()->profile)
                                            <img src="{{asset("profile/".auth()->user()->profile)}}" width="100px" height="100px" alt="profile" style="border-radius:100%; border:1px solid black;">
                                            @else
                                            <img src="{{asset("img/photo/6.jpg")}}" width="100px" height="100px" alt="profile" style="border-radius:100%; border:1px solid black;">
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">Patient ID</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">ERS - {{$patient->id ?? ""}}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">အမည်</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">
                                                    {{ $patient->name ?? auth()->user()->name }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">ဖုန်းနံပါတ်</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $patient->phno ?? '' }}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">မှတ်ပုံတင်</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $patient->nrc ?? '' }}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">မွေးနေ့</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $patient->dob ?? '' }}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">ကျား/မ</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $patient->gender ?? '' }}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">အရပ်</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $initial->height ?? '' }}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">သွေးအမျိုးအစား</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $initial->blood_type ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">လိပ်စာ :</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $p_address->address ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">မြို့နယ် :</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">{{ $p_address->city ?? '' }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                        <div class="card shadow mt-4" style="width: 100%; height:40%;">
                            <div class="cade-header row mt-5">
                                <div class="col-md-1 "></div>
                                <h2 class="cade-title col ms-3 ms-md-0"><b>အရေးပေါ်ဆက်သွယ်ရမည့် အချက်အလက်များ</b></h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-md-center">
                                        <div class="d-flex justify-content-between align-items-centerb mt-3 mb-3  mt-md-5 mb-md-5">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">
                                                    အမည်</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">
                                                    {{ $emergency->contact_name ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">
                                                    ဖုန်းနံပါတ်</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">
                                                    {{ $emergency->contact_number ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mt-4" style="width: 100%; height:60%;">
                            <div class="cade-header row mt-5">
                                <div class="col-md-1 "></div>
                                <h1 class="cade-title col ms-3 ms-md-0">Insurance Information</h1>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-md-center">
                                        <div class="d-flex justify-content-between align-items-center mb-3 mt-3">
                                            <div class="col-3">
                                                <h4 class="fw-bolder text-left">Company Name</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">
                                                    {{ $insurance->company_name ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 mt-3">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">Conact Number</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">
                                                    {{ $insurance->company_contact_number ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 mt-3">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">Address</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">
                                                    {{ $insurance->company_address ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div class="col-3">
                                                <h4 class="text-left fw-bolder">Medical Plan</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4 class="text-left">:</h4>
                                            </div>
                                            <div class="col-7">
                                                <h4 class="text-left">
                                                    {{ $insurance->medical_plan ?? '' }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                    <div class="d-flex justify-content-end p-3" style="margin-bottom:50px;">
                        <a href="{{ url('/home') }}"> <button type="button" class="btn btn-danger me-4">Back</button></a>
                        <a href="{{ url('profile_edit') }}"><button type="button" class="btn btn-primary">Edit</button></a>
                    </div>
                </div>
            </section>
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