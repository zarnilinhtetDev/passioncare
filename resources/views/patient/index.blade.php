@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" class="bg-light">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">

        @include('landing_page.nav')
        <div id="exTab1" class="container ">
            <div class="tab-content clearfix  ">
                <div style="margin-top: 5%">
                    <section class="container-fluid">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="row pb-5">
                                <div class="col-12 col-md-6 d-flex justify-content-center mt-4">
                                    <div class="card shadow" style="width: 100%">
                                        <div class="mt-5">
                                            <h1 class="card-title text-center">Personal Information</h1>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-center">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">Patient ID :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">ID-00001</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">အမည် :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ auth()->user()->name}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">ဖုန်းနံပါတ် :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ $patient->phno??"" }}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">မှတ်ပုံတင် :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{$patient->nrc??""}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">မွေးနေ့ :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{$patient->dob??""}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">ကျား/မ :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ $patient->gender ??"" }}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">အရပ် :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{$initial->height??""}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">သွေးအမျိုးအစား :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{$initial->blood_type ?? ""}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">လိပ်စာ :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ $p_address->address??""  }}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">မြို့နယ် :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ $p_address->city??""  }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                                    <div class="card shadow mt-4" style="width: 100%; height:40%;">
                                        <div class="mt-5">
                                            <h1 class="cade-title text-center">Emergency Information</h1>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-md-center">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">အရေးပေါ်ဆက်သွယ်ရမည့် လူနာမည် :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ $emergency->contact_name??"" }}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">အရေးပေါ်ဆက်သွယ်ရမည့်ဖုန်းနံပါတ် :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ $emergency->contact_number??""  }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card shadow mt-4" style="width: 100%; height:60%;">
                                        <div class="cade-header mt-5 mx-auto">
                                            <h1 class="cade-title text-center">Insurance Information</h1>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-md-center">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">Company Name :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{$insurance->company_name??""}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">Conact Number :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{$insurance->company_contact_number??""}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">Address :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{$insurance->company_address??""}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0 fw-bolder">Medical Plan :</h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <h4 class="px-3 py-4 m-0">{{ $insurance->medical_plan??"" }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                </div>
                                <div class="d-flex justify-content-end p-3">
                                    <a href="{{url('/home')}}" class="btn btn-danger btn-lg me-4">Back</a>
                                    <a href="{{url('profile_edit')}}"><button type="button" class="btn btn-primary btn-lg">Edit</button></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="bottom-nav" style="background-color: #337AB7" id="bottom-nav">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <a href="#">
                        <i class="fas fa-search"></i>
                        Search
                    </a>
                    <a href="#">
                        <i class="fas fa-plus"></i>
                        Add
                    </a>
                    <a href="#">
                        <i class="fas fa-heart"></i>
                        Favorites
                    </a>
                    <a href="#">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>

                    <a href="#" class="text-dark">
                        {{-- <i class="fa fa-angle-up"> --}}
                        <i class="fa fa-arrow-up"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
</body>

@include('landing_page.footer_section')
