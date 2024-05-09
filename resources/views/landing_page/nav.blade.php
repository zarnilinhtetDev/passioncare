{{-- navbar --}}
<nav class="nav navbar-expand-lg row"
    style="background-color: #337AB7; position: fixed; top:0; width: 100%; z-index: 1000; font-size: 12px;border-radius:0;">


    {{-- <div class="" > --}}
    <div class=" col-5 d-flex col-lg-3">
        <div class="d-flex justify-content-start align-items-center ms-5">
            <img src="{{ asset('img/Logo.png') }}" alt="" width="50px" height="48px" style="border-radius: 20%;">
            <h4 class="text-white ms-2">Easy Referral System </h4>
        </div>
    </div>
    <div class=" col-7 col-lg-6 offset-3">
        <ul class="navbar d-flex justify-content-between"
            style="list-style: none; text-decoration:none; border-bottom:none;">
            <li class="nav-item">
                <a class="nav-link text-white fs-4" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                @if (Auth::user()->type == 'mo')
                    <a class="nav-link text-white fs-4" href="{{ url('/mo_hospital') }}">Hospital</a>
                @else
                    <a class="nav-link text-white fs-4" href="{{ url('/hospital') }}">Hospital</a>
                @endif
            </li>
            <li class="nav-item">
                @if (Auth::user()->type == 'mo')
                    <a class="nav-link text-white fs-4" href="{{ url('/mo_doctor') }}">Doctor</a>
                @else
                    <a class="nav-link text-white fs-4" href="{{ url('/doctor') }}">Doctor</a>
                @endif
            </li>
            <li class="nav-item" style="cursor: pointer !important">
                <a class="nav-link text-white fs-4">Our Services</a>
            </li>
            <li class="nav-item" style="cursor: pointer !important">
                <a class="nav-link text-white fs-4">Activity</a>
            </li>
            <li class="nav-item" style="cursor: pointer !important">
                <a class="nav-link text-white fs-4">About us</a>
            </li>
            <li class="nav-item" style="cursor: pointer !important">
                <a href="#map" class="nav-link text-white fs-4">Map</a>
            </li>
            <li class="nav-item" style="cursor: pointer !important">
                <a class="nav-link text-white fs-4">Help</a>
            </li>
            <li class="nav-item">
                <a class="text-white" href=""><i class="fa fa-comment fa-1x"></i></a>
            </li>
            <li class="nav-item">
                <a class="mx-3 text-white" href=""><i class="fa fa-bell fa-1x"></i></a>
            </li>

            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="text-white">{{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu Drop" style="background-color: #F0F5F9">
                        @if (Auth::user()->type == 'mo')
                            <a class="p-1 btn changelogout" href="{{ url('user') }}" style="width: 100px">User</a>
                        @else
                            <a href="{{ url('/profile') }}" class="p-1 btn changelogout"
                                style="width: 100px">Profile</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-1 btn changelogout" style="width: 100px">
                                <span class="text-dark">Logout</span></button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>
