<style>
    .navbar-expand-lg {
        position: relative !important;
    }
</style>

@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        @include('landing_page.nav')
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <section class="container-fluid">
            <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card shadow p-3" style="width: 55rem;">
                            <div class="cade-header mt-5 mx-auto">
                                <h1 class="cade-title text-center">Personal Information</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">Patient ID</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">ID-00001</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">အမည် : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ auth()->user()->name}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">ဖုန်းနံပါတ် : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $patient->phno??"" }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">မှတ်ပုံတင် : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{$patient->nrc??""}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">မွေးနေ့ : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $patient->dob??"" }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">ကျား/မ : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $patient->gender ??"" }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">အရပ် : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{$initial->height??""}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">သွေးအမျိုးအစား : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{$initial->blood_type ?? ""}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">လိပ်စာ : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $p_address->address??"" }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">မြို့နယ် : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $p_address->city??"" }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                        <div class="card shadow p-3" style="width: 115rem; height:40%;">
                            <div class="cade-header mt-5 mx-auto">
                                <h1 class="cade-title text-center">Emergency Information</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">အရေးပေါ်ဆက်သွယ်ရမည့် လူနာမည် : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $emergency->contact_name??"" }} </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">အရေးပေါ်ဆက်သွယ်ရမည့်ဖုန်းနံပါတ် : </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $emergency->contact_number??""  }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4" style="width: 115rem; height:60%;">
                            <div class="cade-header mt-5 mx-auto">
                                <h1 class="cade-title text-center">Insurance Information</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">Company Name:</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{$insurance->company_name ??""}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">Conact Number:</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{$insurance->company_contact_number??""}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">Address:</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{$insurance->company_address??""}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">Medical Plan:</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">{{ $insurance->medical_plan??"" }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3">Chief Complaint</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="px-5 py-3"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end p-3">
                                    <a href="{{url('profile_edit')}}"><button type="button" class="btn btn-primary btn-lg">Edit</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>