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
            <div class="d-flex align-items-center justify-content-center mt-2 mt-sm-0 mt-lg-5 mt-xl-0" style="min-height: 100vh;">
                <div class="card" style="width: 70rem">
                    <div class="card-body m-5">
                        <form action="{{route('update.booking',$booking_data->id)}}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <label for="name" class=" col-md-3">
                                    <h3>အမည် :</h3>
                                </label>
                                <input type="text" class=" form-control col fs-4" id="customer_name" placeholder="Enter Name" required autofocus name="customer_name" value="{{ $booking_data->name }}" readonly>
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ဆရာဝန်အမည် :</h3>
                                </label>
                                <input type="text" class=" form-control col fs-4" id="customer_name" placeholder="Enter Doctor Name" required autofocus name="customer_name" value="{{ $booking_data->doctor_name }}" readonly>
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ဆေးရုံအမည် :</h3>
                                </label>
                                <input type="text" class=" form-control col fs-4" id="customer_name" placeholder="Enter Doctor Name" required autofocus name="customer_name" value="{{ $booking_data->hospital_name }}" readonly>
                                </select>
                            </div>
                            <!-- <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h4>GPS Link :</h4>
                                </label>
                                <div class="input-group col fs-4">
                                    <input type="hospital_google_address_link" class="form-control" id="hospital_google_address_link" value="{{$booking_data->hospital_google_address_link}}" name="hospital_google_address_link" placeholder="Enter Google Address Link" readonly>
                                    <button type="button" id="copyLinkBtn" class="btn btn-primary"> <i class="fa-solid fa-paperclip"></i></button>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ဆေးရုံလိပ်စာ :</h3>
                                </label>
                                <textarea name="hospital_address" class="form-control col fs-4" id="hospital_address" rows="5" readonly>{{$booking_data->hospital_address}}</textarea>
                            </div> -->
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>အထူးကု :</h3>
                                </label>
                                <input type="text" class="form-control col fs-4" id="chief_complaint" placeholder="Enter Name" value="{{$booking_data->chief_complaint}}" required autofocus name="chief_complaint" readonly>
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ပြသလိုသော အကြောင်းအရာ :</h3>
                                </label>
                                <textarea class="form-control col fs-4" name="description" id="" cols="30" rows="5" readonly>{{$booking_data->description}}</textarea>
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ရက်ချိန်းပေးရန် :</h3>
                                </label>
                                <input type="date" class="form-control col fs-4" id="date" placeholder="Enter Appointment Date" required autofocus name="date">
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('home') }}"><button type="button" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ</button></a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Modal End --}}
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

        <script>
            document.getElementById("copyLinkBtn").addEventListener("click", function() {
                var copyText = document.getElementById("hospital_google_address_link");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
            });
        </script>

        @include('landing_page.footer_section')