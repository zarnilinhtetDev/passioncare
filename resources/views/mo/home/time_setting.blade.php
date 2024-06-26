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
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">
        @include('landing_page.nav')
        <section class="container">
            <div class="d-none d-lg-block d-xl-none" style="height:50px;"></div>
            <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">
                <div class="card mt-lg-5 shadow" style="width: 70rem">
                    <h1 class="mt-5 mb-0 ms-5">&nbsp;Setting</h1>
                    <div class="card-body mt-3 mx-5">
                        <form action="{{ url("save_time_setting")}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="name">
                                    <h3>MO အရေအတွက် :</h3>
                                </label>
                                <input type="number" name="mo_number" id="mo_number" class="form-control" style="height:45px;" value="{{$time->mo_number ?? 0}}" />
                            </div>
                            <div class="mb-4 form-group">
                                <label for="name">
                                    <!-- <h3>Estimated call time per Patient :</h3> -->
                                    <h3>ဆွေးနွေးရန်ခန့်မှန်းကြာချိန် :</h3>
                                </label>
                                <input type="number" class="form-control" name="call_time" style="height:45px;" value="{{$time->call_time ?? 0}}">
                            </div>
                            <div class="d-flex justify-content-center mt-5 mb-4">
                                <a href="{{ url('/') }}" class="btn btn-danger btn-lg me-4 shadow">မလုပ်တော့ပါ။</a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4 shadow">တင်သွင်းမည်။</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- </footer> -->
            {{-- Modal End --}}
        </section>

        <!-- <footer id="bottom-nav"> -->
        <footer id="bottom-nav" style="padding: 0 !important;">
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