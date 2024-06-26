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
            <div class="d-none d-md-block" style="height:100px;"></div>
            <div class="d-flex align-items-center justify-content-center mt-2 mt-sm-0 mt-lg-5 mt-xl-0" style="min-height: 80vh;">
                <div class="card shadow card-border-dark bg-body-tertiary rounded mt-5 mt-md-0" style="width: 70rem">
                    <div class="card-body m-5">
                        <h1 class="text-center mb-5">ဆေးရုံဆေးခန်းဘိုကင်တင်ရန်</h1>
                        @if (empty($patient->gender && $patient->nrc && $patient_emergency->contact_name && $patient_emergency->contact_number))
                        <form action="{{ url('booking_save',$patient->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="mb-4 form-group col-md-6">
                                    <label for="gender"><span class="fs-4">Gender</span><span class="text-danger fs-4 ps-2">*</span></label>
                                    <select name="gender" id="" class="form-control" style="font-size: 15px; !important" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">
                                            <h3>Female</h3>
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-4 form-group col-md-6">
                                    <label for="name"><span class="fs-4">NRC Number</span><span class="text-danger fs-4 ps-2">*</span></label>
                                    <input type="text" class="form-control" id="nrc" name="nrc" style="font-size: 15px !important;" required>
                                </div>
                                <div class="mb-4 form-group col-md-6">
                                    <label for="name"><span class="fs-4">Emergency Contact Name</span><span class="text-danger fs-4 ps-2">*</span></label>
                                    <input type="text" class="form-control" id="name" style="font-size: 15px !important;" name="contact_name" required>
                                </div>
                                <div class="mb-4 form-group col-md-6"><label for="contact_number"><span class="fs-4">Emergency Contact Number</span><span class="text-danger fs-4 ps-2">*</span></label>
                                    <input type="text" class="form-control" id="contact_number" style="font-size: 15px !important;" name="contact_number" required>
                                </div>
                                <div class="mb-4 form-group col-md-6">
                                    <label for="name">
                                        <span class="fs-4">အမည် :</span><span class="text-danger fs-4 ps-2">*</span>
                                    </label>
                                    <input type="text" class=" form-control col fs-4" id="customer_name" placeholder="Enter Name" required autofocus name="customer_name" value="{{ $patient->name }}">
                                </div>

                                <div class="mb-4 form-group col-md-6">
                                    <label for="hospital_name">
                                        <span class="fs-4">ဆေးရုံအမည် :</span><span class="text-danger fs-4 ps-2">*</span>
                                    </label>
                                    <select name="hospital_name" class="form-control col fs-4" id="hospital_name" onchange="updateModels()">
                                        <option value="" {{ old('hospital_name') == '' ? 'selected' : '' }} disabled>ဆေးရုံရွေးပါ</option>
                                        @foreach ($hospitals as $hospital)
                                        <option value="{{ $hospital->hospital_name }}" {{ old('hospital_name') == $hospital->hospital_name ? 'selected' : '' }}>{{ $hospital->hospital_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4 form-group col-md-6">
                                    <label for="hospital_address">
                                        <span class="fs-4">ဆေးရုံ လိပ်စာ :</span><span class="text-danger fs-4 ps-2">*</span>
                                    </label>
                                    <input type="text" class=" form-control col fs-4" placeholder="Enter Name" required autofocus id="hospital_address" name="hospital_address">

                                </div>
                                <div class="mb-4 form-group col-md-6">
                                    <label for="google_link">
                                        <span class="fs-4">Google Link :</span><span class="text-danger fs-4 ps-2">*</span>
                                    </label>
                                    <input type="text" class=" form-control col fs-4" id="google_link" placeholder="Enter Name" required autofocus name="google_link">

                                </div>
                                <div class="mb-4 form-group col-md-6" id="modelDropdown">
                                    <label for="doctor_name">
                                        <span class="fs-4">ဆရာဝန်အမည် :</span><span class="text-danger fs-4 ps-2">*</span>
                                    </label>
                                    <select name="doctor_name" class="form-control col fs-4" id="doctor_name" required onchange="doctorChanged()">
                                        <option value="" {{ old('doctor_name') == '' ? 'selected' : '' }}disabled>ဆရာဝန်ရွေးပါ</option>
                                        @foreach ($doctors as $doctor)
                                        @foreach ($doctor->moDoctor2s as $hospital )
                                        <option value="{{ $doctor->doctor_name }}" data-brand="{{ $hospital->hospitalname }}" {{ old('doctor_name') == $doctor->doctor_name ? 'selected' : '' }}>{{$doctor->doctor_name}}
                                        </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4 form-group col-md-6">
                                    <label for="specilist">
                                        <span class="fs-4">Speciality :</span><span class="text-danger fs-4 ps-2">*</span>
                                    </label>
                                    <input type="text" class="form-control col fs-4" id="specilist" name="specilist" placeholder="Enter Name" required autofocus name="chief_complaint">
                                </div>
                                <div class="mb-4 form-group col-md-12">
                                    <label for="description">
                                        <span class="fs-4">ပြသလိုသော အကြောင်းအရာ :</span><span class="text-danger fs-4 ps-2">*</span>
                                    </label>
                                    <textarea class="form-control col fs-4" name="description" id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="d-flex justify-content-center mt-4 col-md-12">
                                    <a href="{{ route('home') }}"><button type="button" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ</button></a>
                                    <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="{{ url('booking_save',$patient->id) }}" method="post">
                            @csrf
                            <div class="mb-4 form-group">
                                <label for="name">
                                    <span class="fs-4">အမည် :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <input type="text" class=" form-control col fs-4" id="customer_name" placeholder="Enter Name" required autofocus name="customer_name" value="{{ $patient->name }}">
                            </div>

                            <div class="mb-4 form-group">
                                <label for="hospital_name">
                                    <span class="fs-4">ဆေးရုံအမည် :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <select name="hospital_name" class="form-control col fs-4" id="hospital_name" onchange="updateModels()">
                                    <option value="" {{ old('hospital_name') == '' ? 'selected' : '' }} disabled>ဆေးရုံရွေးပါ</option>
                                    @foreach ($hospitals as $hospital)
                                    <option value="{{ $hospital->hospital_name }}" {{ old('hospital_name') == $hospital->hospital_name ? 'selected' : '' }}>{{ $hospital->hospital_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="hospital_address">
                                    <span class="fs-4">ဆေးရုံ လိပ်စာ :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <input type="text" class=" form-control col fs-4" placeholder="Enter Name" required autofocus id="hospital_address" name="hospital_address">

                            </div>
                            <div class="mb-4 form-group">
                                <label for="google_link">
                                    <span class="fs-4">Google Link :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <input type="text" class=" form-control col fs-4" id="google_link" placeholder="Enter Name" required autofocus name="google_link">

                            </div>
                            <div class="mb-4 form-group" id="modelDropdown">
                                <label for="doctor_name">
                                    <span class="fs-4">ဆရာဝန်အမည် :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <select name="doctor_name" class="form-control col fs-4" id="doctor_name" required onchange="doctorChanged()">
                                    <option value="" {{ old('doctor_name') == '' ? 'selected' : '' }}disabled>ဆရာဝန်ရွေးပါ</option>
                                    @foreach ($doctors as $doctor)
                                    @foreach ($doctor->moDoctor2s as $hospital )
                                    <option value="{{ $doctor->doctor_name }}" data-brand="{{ $hospital->hospitalname }}" {{ old('doctor_name') == $doctor->doctor_name ? 'selected' : '' }}>{{$doctor->doctor_name}}
                                    </option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4 form-group">
                                <label for="specilist">
                                    <span class="fs-4">Speciality :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <input type="text" class="form-control col fs-4" id="specilist" name="specilist" placeholder="Enter Name" required autofocus name="chief_complaint">
                            </div>
                            <div class="mb-4 form-group">
                                <label for="description">
                                    <span class="fs-4">ပြသလိုသော အကြောင်းအရာ :</span><span class="text-danger fs-4 ps-2">*</span>
                                </label>
                                <textarea class="form-control col fs-4" name="description" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('home') }}"><button type="button" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ</button></a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်</button>
                            </div>
                        </form>
                        @endif
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
            // JavaScript
            function updateModels() {
                var selectedBrand = document.getElementById('hospital_name').value;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.part.data_hospital') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        hospital_name: selectedBrand,
                    },

                    success: function(data) {
                        document.getElementById('hospital_address').value = data.hospital_address;
                        document.getElementById('google_link').value = data.hospital_google_address_link;
                    },
                    error: function(error) {
                        console.error(error);

                    }
                });

                var modelDropdown = document.getElementById('modelDropdown');
                var modelOptions = modelDropdown.getElementsByTagName('option');
                document.getElementById('specilist').value = "";
                // modelDropdown.style.display = 'block';
                for (var i = 0; i < modelOptions.length; i++) {
                    if (selectedBrand === "" || modelOptions[i].getAttribute('data-brand') === selectedBrand) {
                        modelOptions[i].hidden = false;
                    } else {
                        modelOptions[i].hidden = true;
                    }
                }
                // Show the "Select Model" option if no brand is selected
                if (selectedBrand == "") {
                    modelDropdown.selectedIndex = 0;
                } else {
                    // Automatically select the first model for the selected brand
                    for (var i = 0; i < modelOptions.length; i++) {

                        if (modelOptions[i].getAttribute('data-brand') === selectedBrand) {
                            modelOptions[0].selected = true;
                            break;
                        }
                    }
                }
            }
            // Call updateModels() when the page is loaded
            window.addEventListener('load', updateModels);

            function doctorChanged() {
                var doctor_name = document.getElementById('doctor_name').value;

                console.log(doctor_name);


                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.part.data_doctor_specilization') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        doctor_name: doctor_name,

                    },
                    success: function(data) {
                        document.getElementById('specilist').value = data.doctor_specialities;

                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        </script>

        @include('landing_page.footer_section')