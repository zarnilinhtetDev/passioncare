@include('landing_page.header_section')

<body class="bg-light" id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style=" font-family: Arial, Helvetica, sans-serif;">
        @include('landing_page.nav')
        <section class="container-fluid">
            <div class="d-none d-lg-block d-xl-none" style="height:50px;"></div>
            <div class="d-flex align-items-center justify-content-center" style="min-height: 40vh;">
                <div class="col-8 col-lg-4 p-0">
                    <div class="card shadow">
                        <div class="mt-5">
                            <h4 class="card-title text-center">ကျေးဇူးတင်ပါသည်။</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">သင်၏ ဘိုကင်နံပါတ်သည် {{$ticket_no}} ဖြစ်ပါသည်။</h4>
                            @if (isset($date_format))
                            <h4 class="text-center mt-3">သင်၏ ဘိုကင်ရက်ချိန်းသည် {{$date_format->format("d-m-Y")}} ဖြစ်ပါသည်။</h4>
                            @endif
                            <div class=" d-flex justify-content-center p-3">
                                <a href="{{url('/')}}" class="btn btn-lg text-white" style="background-color: #123093">Close</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class=" d-flex justify-content-end p-3">
                        <a href="{{route('home')}}" class="btn btn-primary btn-lg">Close</a>
                    </div> -->
                </div>
            </div>

    </div>
    </section>

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
    <!-- </footer> -->
    </div>
    @include('landing_page.footer_section')