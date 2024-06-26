@include('landing_page.header_section')
<style>
    table tr,
    th,
    td,
    input,
    select,
    textarea,
    .card {
        font-size: 1.5rem !important;
    }

    .btn {
        font-size: 13px !important;
    }

    @media (max-width: 768px) {

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
    <div class="d-none d-lg-block d-xl-none" style="height:60px;"></div>
    {{-- Tabs with table Section --}}
    <div id="exTab1" class="container mt-5 mb-lg-5 px-0">

        <div class="tab-content clearfix ">
            <div style="margin-top: 5%">
                <!-- <h1 class="ms-5">User Edit</h1> -->
            </div>
            <div class="" style="margin-top: 3%">

                <div class="container-fluid">
                    <div class="row justify-content-center d-flex">

                        <!-- left column -->
                        <div class="col-md-8 mb-5">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible show" role="alert">
                                <strong class="text-center mx-auto fs-4">{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header p-4">
                                    <h3 class="card-title">User Edit</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('userUpdate', $userData->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body p-5">

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="login_type" name="login_type" value="{{ auth()->user()->type }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Name" required autofocus name="name" value="{{ $userData->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $userData->email }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phno">Phone Number</label>
                                            <input type="phone" class="form-control" id="phno" placeholder="Enter phone number" name="phno" value="{{$userData->phno}}">
                                            @error('phno')
                                            <div class="error text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>

                                        @if (auth()->user()->type == 'mo' && auth()->user()->level == '1')
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="patient" @if ($userData->type === 'Patient') selected @endif>Patient
                                                </option>
                                                <option value="mo" @if ($userData->type === 'mo') selected @endif>Mo</option>
                                                <option value="hospital" @if ($userData->type === 'hospital') selected @endif>Hospital
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="level">level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option value="1" @if ($userData->level === '1') selected @endif>level 1</option>
                                                <option value="2" @if ($userData->level === '2') selected @endif>level 2</option>
                                                <option value="3" @if ($userData->level === '3') selected @endif>level 3</option>
                                            </select>
                                        </div>
                                        @else
                                        <input type="hidden" name="type" value="{{auth()->user()->type}}">
                                        <input type="hidden" name="level" value="{{auth()->user()->level}}">
                                        @endif

                                        @if (auth()->user()->type == "mo" && auth()->user()->level == "1" || auth()->user()->level == '2')
                                        <div class="form-group">
                                            <label for="new_profile">Profile</label>
                                            <input type="file" class="form-control" id="new_profile" name="new_profile">
                                            <input type="hidden" class="form-control" id="old_profile" name="old_profile" value="{{$userData->profile}}">
                                            @error('new_profile')
                                            <div class="error text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <input type="checkbox" class="" id="pass_check" name="pass_check">
                                            <label for="pass_check">Click here to change password</label>
                                        </div>
                                        <div class="form-group" style="display:none;" id="password_field">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="new-password">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer d-flex justify-content-between p-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        @if (Auth::user()->type == 'mo' && Auth::user()->level == '1')
                                        <a href="{{ route('user') }}" class="btn btn-danger">Cancel</a>
                                        @else
                                        <a href="{{ url('/') }}" class="btn btn-danger">Cancel</a>
                                        @endif
                                    </div>
                                </form>

                            </div>
                        </div>
                        {{-- @endif --}}

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

    <script>
        const newPassCheck = document.getElementById('pass_check');
        const passwordField = document.getElementById('password_field');
        newPassCheck.addEventListener('change', function() {
            if (this.checked) {
                passwordField.style.display = 'block';
            } else {
                passwordField.style.display = 'none';
            }
        });
    </script>
    @include('landing_page.footer_section')
