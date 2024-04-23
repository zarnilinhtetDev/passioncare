{{-- navbar --}}
<nav class="nav navbar-expand-lg row" style="background-color: #337AB7; position: fixed; top:0; width: 100%; z-index: 1000; font-size: 12px;border-radius:0;">


    {{-- <div class="" > --}}
    <div class=" col-5 col-lg-3">
        <div class="d-flex justify-content-start align-items-center">
            <img src="" alt="">
            <h4 class="text-white pt-3">Easy Referral System </h4>
        </div>
    </div>
    <div class=" col-7 col-lg-6 offset-3">
        <ul class="navbar d-flex justify-content-between" style="list-style: none; text-decoration:none; border-bottom:none;">
            <li class="nav-item">
                <a class="nav-link text-white fs-4" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white fs-4" href="#">Hospital</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white fs-4" href="#">Doctors</a>
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
                <a class="nav-link text-white fs-4">Map</a>
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
                    <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-white">{{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu Drop" style="background-color: #F0F5F9">
                        <a href="{{url('profile')}}" class="p-1 btn changelogout" style="width: 100px">Profile</a>
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
    {{-- </div> --}}
</nav>