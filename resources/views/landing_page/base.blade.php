{{-- footer section --}}
<style>
    @media (max-width: 768px) {
        * {
            font-size: 11px !important;
        }
    }
</style>
<footer class="pt-5 pb-5 pb-lg-0" style="background-color: black;font-size: 15px">

    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="widget">
                    <h5 class="text-white" style="font-size: 15px;">Follow me for more !Links clickable in the
                        preview.</h5>
                    <ul class="company-social">
                        <li class="social-twitter"><a href="#"><i class="fa-brands fa-square-instagram fa-instagram text-white"></i></a>
                        </li>
                        <li class="social-facebook"><a href="#"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <!-- <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a>
                        </li> -->
                        <li class="social-vimeo"><a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        </li>
                        <li class="social-dribble mt-2 mt-md-0"><a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="widget">
                    <h5 class="text-white" style="font-size: 15px;">ERS System</h5>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="{{url("/termsofuse")}}">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="widget">
                    <h5 class="text-white" style="font-size: 15px;">Our Services</h5>
                    <ul class="text-white">
                        <li><b>Consultation</b></li>
                        <li><b>Lab Tests</b></li>
                        <li><b>Health Packages</b></li>
                        <li><b>Scans & X-Rays</b></li>
                        <li><b>Long Term Care Plans</b></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="widget">
                    <h5 class="text-white" style="font-size: 15px;">Health Tools</h5>
                    <ul class="text-white">
                        <li><b>Blood Pressure Monitor</b></li>
                        <li><b>SPO2 Tracker</b></li>
                        <li><b>Heart Rate Monitor</b></li>
                        <li><b>Period Tracker</b></li>
                        <li><b>Self Checks</b></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 pb-2 pb-sm-0">
                <p class="text-white text-center pivacy-policy">© 2024 ERS System. All Rights Reserved Website Terms and Conditions
                    User Terms & Conditions Privacy
                    Policy</p>
            </div>
        </div>
    </div>


</footer>

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

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