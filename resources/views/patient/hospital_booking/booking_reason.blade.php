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
        <div class="d-none d-md-block" style="height:100px;"></div>
        <section class="container">
            <div class="d-none d-lg-block d-xl-none" style="height:50px;"></div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="card shadow card-border-dark bg-body-tertiary rounded mt-5 mt-md-0" style="width: 70rem">
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                    @endif
                    <div class="card-body m-5">
                        @if (empty($patient->gender && $patient->nrc && $patient_emergency->contact_name && $patient_emergency->contact_number))
                        <form action="{{ url('patient_health_record_store',$patient->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 form-group">
                                <label for="gender"><span class="fs-4">Gender</span><span class="text-danger fs-4 ps-2">*</span></label>
                                <select name="gender" id="" class="form-control" style="font-size: 15px !important:" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">
                                        <h3>Female</h3>
                                    </option>
                                </select>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="name"><span class="fs-4">NRC Number</span><span class="text-danger fs-4 ps-2">*</span></label>
                                <input type="text" class="form-control" id="nrc" name="nrc" required>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="name"><span class="fs-4">Emergency Contact Name</span><span class="text-danger fs-4 ps-2">*</span></label>
                                <input type="text" class="form-control" id="name" name="contact_name" required>
                            </div>
                            <div class="mb-4 form-group"><label for="contact_number"><span class="fs-4">Emergency Contact Number</span><span class="text-danger fs-4 ps-2">*</span></label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="name">
                                    <span class="fs-4">ဆေးခန်းပြလိုသည့် အကြောင်းအရာ :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="name">
                                    <span class="fs-4">ဆေးစာနှင့် ဆေးစစ်ချက်များတင်ရန် :</span>
                                </label>
                                <input type="file" class="form-control" name="file_name">
                                @error('file_name')
                                    <div class="error text-danger"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ url('/home') }}" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ။</a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်။</button>
                            </div>
                        </form>
                        @else
                        <form action="{{ url('patient_health_record_store',$patient->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 form-group">
                                <label for="name">
                                    <span class="fs-4">ဆေးခန်းပြလိုသည့် အကြောင်းအရာ :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="name">
                                    <span class="fs-4">ဆေးစာနှင့် ဆေးစစ်ချက်များတင်ရန် :</span>
                                </label>
                                <input type="file" class="form-control" name="file_name">
                                @error('file_name')
                                    <div class="error text-danger"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ url('/home') }}" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ။</a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်။</button>
                            </div>
                        </form>
                        @endif
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