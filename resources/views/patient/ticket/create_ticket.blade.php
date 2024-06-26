@include('landing_page.header_section')
<style>
    table tr,
    th,
    td,
    input,
    select,
    textarea {
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

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">

        @include('landing_page.nav')

        <section class="container-fluid container-xl pt-lg-5 pb-5">
            <div class="row px-md-5 my-md-5" style="font-size: 14px !important;">
                <div class="col-12 mt-5">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12 col-md-3 text-center">
                            @if ($patient->profile)
                            <img src="{{asset('profile/'.$patient->profile)}}" alt="" width="170" height="180" style="border-radius: 50%;border:1px solid #337AB7;">
                            @else
                            <img src="{{asset('img/doctor1.png')}}" alt="" width="170" height="180" style="border-radius: 50%;border:1px solid #337AB7;">
                            @endif
                        </div>
                        <div class="col-12 col-md-9 ml-2 ml-md-0 d-flex flex-column justify-content-center ">
                            <div class="row">
                                <h3 class="py-4 m-0 fw-bolder">Patient ID : ERS - {{$patient->id}}</h3>
                            </div>
                            <div class="row">
                                <h3 class="py-4 m-0 fw-bolder">Patient Name : {{$patient->name}}</h3>
                            </div>
                            <div class="row">
                                <h3 class="py-4 m-0 fw-bolder">Ticket Stage : </h3>
                            </div>
                        </div>
                    </div>

                    <!-- patient information -->
                    <div class="row mt-5">
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <h2 class="mb-3">Patient Information</h2>
                            </div>
                            <div class="card shadow" style="width: 100%">
                                <div class="row px-lg-1 py-5">
                                    <div class="col-12">
                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Name :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$patient->name}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">DOB :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$patient->dob}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Gender :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{ $patient->gender }}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Phone Number :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$patient->phno}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">NRC Number :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$patient->nrc}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">State/Division :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$p_address->state}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">City :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$p_address->city}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Address :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$p_address->address}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="row" style="visibility: hidden;">
                                    <h2 class="mb-3">.</h2>
                                </div>
                                <div class="card shadow" style="width: 100%">
                                    <div class="row px-lg-1 py-5">
                                        <div class="col-12">
                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Blood Type :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$initial->blood_type}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Height :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$initial->height}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Weight :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$initial->weight}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">BMI :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$initial->bmi}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Last Update :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$initial->created_at->format("d-m-Y")}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mt-md-0">
                            <div class="row">
                                <h2 class="mb-3">Emergency Information</h2>
                            </div>
                            <div class="card shadow">
                                <div class="row px-lg-1 py-5">
                                    <div class="col-12">
                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Name :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$emergency->contact_name}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Contact Number:</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$emergency->contact_number}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Address :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$emergency->contact_address}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Last Update :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">{{$emergency->created_at->format("d-m-Y")}}</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5" style="visibility: hidden !important;">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Last Update :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">20</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5" style="visibility: hidden !important;">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Last Update :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">20</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5" style="visibility: hidden !important;">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Last Update :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">12</h5>
                                            </div>
                                        </div>

                                        <div class="row px-4 px-lg-5" style="visibility: hidden !important;">
                                            <div class="col-6 col-lg-4">
                                                <h4 class="py-4 m-0 fw-bolder">Last Update :</h4>
                                            </div>
                                            <div class="col-6 col-lg-8">
                                                <h5 class="py-4 m-0">20</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <div class="row">
                                    <h2 class="mb-3">Insurance Information</h2>
                                </div>
                                <div class="card shadow">
                                    <div class="row px-lg-1 py-5">
                                        <div class="col-12">
                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Company Name :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$insurance->company_name}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Contact Number:</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$insurance->company_contact_number}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Address :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$insurance->company_address}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Medical Plan :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$insurance->medical_plan}}</h5>
                                                </div>
                                            </div>

                                            <div class="row px-4 px-lg-5 invisible">
                                                <div class="col-6 col-lg-4">
                                                    <h4 class="py-4 m-0 fw-bolder">Last Update :</h4>
                                                </div>
                                                <div class="col-6 col-lg-8">
                                                    <h5 class="py-4 m-0">{{$insurance->created_at->format("d-m-Y")}}</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- patient complaint -->
                    <div class="row mt-5">
                        <form action="{{route('savePatient',$health_record->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="mo_id" value="{{Auth::user()->id}}">
                            <div class="col-12">
                                <div class="row">
                                    <h2 class="mb-3">Patient Complaint</h2>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-12">
                                        <textarea name="patient_complaint" id="patient_complaint" rows="6" class="form-control">{{$health_record->description ?? ''}}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-4 pt-3">
                                    <div class="col-12">
                                        <h2>Patient File</h2>
                                        <input type="text" name="file" id="file" value="{{$health_record->file ?? 'null'}}" class="mt-1" readonly="true">
                                        <a href="{{ asset('HealthRecord/' . ($health_record->file ?? 'null')) }}" class="btn btn-primary ms-2 " download>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4 ms-2 d-flex justify-content-between">
                                <button type="submit" id="" class="btn btn-primary px-4 mt-2 me-5">Create Ticket</button>
                                <a href="{{route("home")}}" id="" class="btn btn-primary px-4 mt-2 ">Close</a>
                            </div>
                        </form>
                    </div>


                    <!-- family history -->
                    <!-- <h2 class="mt-5">Medical History</h2> -->
                    <div class="row mt-2 mx-0 border rounded py-2" style="display:none;">
                        <form action="{{url('save_medical_history',$patient->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket_no}}" />
                            <div class="col-12 col-sm-6 py-4">
                                <div class="row">
                                    <h4 class="mb-3">History of Hospitalization</h4>
                                </div>

                                <div class="card py-5 px-2 px-md-0 shadow" style="width: 100%">
                                    <div class="row">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <label for="hospital_name" class="py-3 m-0 fw-bolder">
                                                        <h4>Hospital Name :</h4>
                                                    </label>
                                                    <input type="text" name="hospital_name" id="hospital_name" class="form-control " style="border-radius: 10px;">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="treatment_date" class="py-3 m-0 fw-bolder">
                                                        <h4>Date :</h4>
                                                    </label>
                                                    <input type="date" name="treatment_date" id="treatment_date" class="form-control " style="border-radius: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <label for="hospitalization_length" class="py-3 m-0 fw-bolder">
                                                        <h4>Length of Hospitalization :</h4>
                                                    </label>
                                                    <input type="text" name="hospitalization_length" id="hospitalization_length" class="form-control" style="border-radius: 10px;">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="hospitalization_reason" class="py-3 m-0 fw-bolder">
                                                        <h4>Reason of Hospitalization :</h4>
                                                    </label>
                                                    <input type="text" name="hospitalization_reason" id="hospitalization_reason" class="form-control" style="border-radius: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <label for="other" class="py-3 m-0 fw-bolder">
                                                <h4>Other :</h4>
                                            </label>
                                            <textarea type="text" name="other" id="other" class="form-control " style="border-radius: 10px;" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 mt-3">
                                        <label for="past_medical_history" class="pb-2 m-0 fw-bolder">
                                            <h4>Other related to past medical history not in a previous box :</h4>
                                        </label>
                                        <select class="form-control fs-4" name="past_medical_history" id="past_medical_history">
                                            <option disabled>Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 mt-3">
                                        <label for="tobacco_consumption" class="pb-2 m-0 fw-bolder">
                                            <h4>Tobacco Consumption:</h4>
                                        </label>
                                        <select class="form-control fs-4" name="tobacco_consumption" id="tobacco_consumption">
                                            <option disabled>Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 mt-3">
                                        <label for="alcohol_consumption" class="pb-2 m-0 fw-bolder">
                                            <h4>Alcohol Consumption :</h4>
                                        </label>
                                        <select class="form-control fs-4" name="alcohol_consumption" id="alcohol_consumption">
                                            <option disabled>Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 mt-3">
                                        <label for="document" class="pb-2 m-0 fw-bolder">
                                            <h4>Document Uploads :</h4>
                                        </label>
                                        <input type="file" class="form-control fs-4" name="document" id="document">
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-sm-6 py-4">
                                <div class="row">
                                    <h4 class="mb-3">History of Drug Allergy</h4>
                                </div>

                                <div class="card px-2 px-md-0 py-4 shadow" style="width: 100%">
                                    <div class="row">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <label for="drug" class="py-3 m-0 fw-bolder">
                                                <h4>Name the Drug :</h4>
                                            </label>
                                            <textarea name="drug" id="drug" class="form-control " style="border-radius: 10px;" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="card mt-4 px-2 px-md-0 py-4 shadow" style="width: 100%">
                                    <div class="row">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <label for="current_medication" class="py-3 m-0 fw-bolder">
                                                <h4>Current Medication :</h4>
                                            </label>
                                            <textarea name="current_medication" id="current_medication" class="form-control " style="border-radius: 10px;" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-5">
                                    <h4 class="mb-3">History of Any Operation</h4>
                                </div>
                                <div class="card mt-2 px-2 px-md-0 py-5 shadow" style="width: 100%">
                                    <div class="row">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <label for="history_hospital_name" class="py-3 m-0 fw-bolder">
                                                        <h4>Hospital Name :</h4>
                                                    </label>
                                                    <input type="text" name="history_hospital_name" id="history_hospital_name" class="form-control " style="border-radius: 10px;">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="history_treatment_date" class="py-3 m-0 fw-bolder">
                                                        <h4>Date :</h4>
                                                    </label>
                                                    <input type="date" name="history_treatment_date" id="history_treatment_date" class="form-control " style="border-radius: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 mt-3">
                                        <label for="betel_consumption" class="pb-2 m-0 fw-bolder">
                                            <h4>Betel Consumption :</h4>
                                        </label>
                                        <select class="form-control fs-4" name="betel_consumption" id="betel_consumption">
                                            <option disabled>Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 mt-5 text-end">
                                    <button type="submit" id="" class="btn btn-primary px-4 mt-md-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row mt-5" style="display:none;">
                        <div class="row ">
                            <form action="{{url('save_ticket_stage')}}" class="row" method="POST">
                                @csrf
                                <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket_no}}" />
                                <input type="hidden" name="patient_id" id="patient_id" value="{{$patient->id}}" />
                                <div class="col-12 col-md-6 mt-5">
                                    <label for="ticket_stage" class="pb-2 m-0 fw-bolder">
                                        <h2>Ticket Stage :</h2>
                                    </label>
                                    <select class="form-control fs-4" name="ticket_stage" id="ticket_stage">
                                        <option disabled>Select ticket stage</option>
                                        <option value="DiscussionStage">Discussion Stage</option>
                                        <option value="MoAssignStage">MO Assign Stage</option>
                                        <option value="BookingStageToGp">Booking Stage to GP</option>
                                        <option value="BookingStageToHospital">Booking Stage to Hospital</option>
                                        <option value="MoReviewStage">MO Review Stage</option>
                                        <option value="CompleteStage">Complete Stage</option>
                                    </select>
                                </div>
                        </div>

                        <div class="col-12 mt-5">
                            <h2 class="mb-1">MO Remark</h2>
                            <div class="row pt-3">
                                <div class="col-12">
                                    <textarea name="mo_remark" id="mo_remark" rows="6" class="form-control" readonly="true"></textarea>
                                </div>
                            </div>

                            <div class="col-12 mt-4 ms-2">
                                <button type="submit" id="" class="btn btn-primary px-4 mt-2">Save</button>
                            </div>
                        </div>

                        </form>
                    </div>

                    <div class="row mt-5" style="display:none;">
                        <div class="col-12">
                            <form action="{{url('save_physical_examination')}}" method="POST">
                                <div class="row">
                                    <h2 class="text-center">Physical Examination Findings</h2>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="card p-5 shadow" style="width: 100%">
                                        @csrf
                                        <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket_no}}" />
                                        <input type="hidden" name="patient_id" id="patient_id" value="{{$patient->id}}" />
                                        <div class="row">
                                            <div class="col-12 col-md-11 mx-auto">
                                                <label for="temperature" class="py-3 m-0 fw-bolder">
                                                    <h4>Temperature :</h4>
                                                </label>
                                                <input type="text" name="temperature" id="temperature" class="form-control " style="border-radius: 10px;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <label for="blood_pressure_sbp" class="py-3 m-0 fw-bolder">
                                                            <h4>Blood Pressure (SBP) :</h4>
                                                        </label>
                                                        <input type="text" name="blood_pressure_sbp" id="blood_pressure_sbp" class="form-control " style="border-radius: 10px;">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="blood_pressure_dbp" class="py-3 m-0 fw-bolder">
                                                            <h4>Blood Pressure (DBP) :</h4>
                                                        </label>
                                                        <input type="text" name="blood_pressure_dbp" id="blood_pressure_dbp" class="form-control " style="border-radius: 10px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <label for="heart_rate_hr" class="py-3 m-0 fw-bolder">
                                                            <h4>Heart Rate(HR) :</h4>
                                                        </label>
                                                        <input type="text" name="heart_rate_hr" id="heart_rate_hr" class="form-control" style="border-radius: 10px;">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="heart_rate_spo2" class="py-3 m-0 fw-bolder">
                                                            <h4>Heart Rate(SPO2) :</h4>
                                                        </label>
                                                        <input type="text" name="heart_rate_spo2" id="heart_rate_spo2" class="form-control" style="border-radius: 10px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="">
                                        <label for="referrals_specialists">
                                            <h4 class="mb-1">General Apperance</h4>
                                        </label>
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="general_apperance" id="general_apperance" rows="6" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="">
                                        <label for="specific_findings">
                                            <h4 class="mb-1">Specific findings related to the chief complaint</h4>
                                        </label>
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="specific_findings" id="specific_findings" rows="6" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4 ms-2">
                                    <button type="submit" id="save" class="btn btn-primary px-4 mt-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-12 mt-5" style="display:none;">
                    <form action="{{url('save_physical_examination_finding')}}" method="POST">
                        @csrf
                        <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket_no}}" />
                        <input type="hidden" name="patient_id" id="patient_id" value="{{$patient->id}}" />
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Eyes</h2>
                                        <h4>Visual Acuity (with/without glass) :</h4>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="visual_r" class="pt-2 m-0 fw-bolder">
                                            Right :
                                        </label>
                                        <input type="text" name="visual_r" id="visual_r" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="visual_l" class="pt-2 m-0 fw-bolder">
                                            Left :
                                        </label>
                                        <input type="text" name="visual_l" id="visual_l" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="visual_pupil_equal" class="pt-2 m-0 fw-bolder">
                                            Pupils equal :
                                        </label>
                                        <input type="text" name="visual_pupil_equal" id="visual_pupil_equal" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h4>Color Vision (with/without glass) :</h4>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="color_r" class="pt-2 m-0 fw-bolder">
                                            Right :
                                        </label>
                                        <input type="text" name="color_r" id="color_r" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="color_l" class="pt-2 m-0 fw-bolder">
                                            Left :
                                        </label>
                                        <input type="text" name="color_l" id="color_l" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="color_regular" class="pt-2 m-0 fw-bolder">
                                            Regular :
                                        </label>
                                        <input type="text" name="color_regular" id="color_regular" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                                <div class="row mt-5 mb-5">
                                    <div class="col-12">
                                        <h2>Hearing</h2>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="hearing_right" class="pt-2 m-0 fw-bolder">
                                            Right :
                                        </label>
                                        <input type="text" name="hearing_right" id="hearing_right" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="hearing_left" class="pt-2 m-0 fw-bolder">
                                            Left :
                                        </label>
                                        <input type="text" name="hearing_left" id="hearing_left" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-5">
                                    <div class="col-12 col-md-6">
                                        <label for="nose" class="pt-2 m-0 fw-bolder">
                                            Nose :
                                        </label>
                                        <input type="text" name="nose" id="nose" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="neck" class="pt-2 m-0 fw-bolder">
                                            Neck :
                                        </label>
                                        <input type="text" name="neck" id="neck" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="thyroid" class="pt-2 m-0 fw-bolder">
                                            Thyroid :
                                        </label>
                                        <input type="text" name="thyroid" id="thyroid" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="teeth_gums" class="pt-2 m-0 fw-bolder">
                                            Teeth & Gums :
                                        </label>
                                        <input type="text" name="teeth_gums" id="teeth_gums" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="tongue_pharynx" class="pt-2 m-0 fw-bolder">
                                            Tongue & Pharynx :
                                        </label>
                                        <input type="text" name="tongue_pharynx" id="tongue_pharynx" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="tonsils" class="pt-2 m-0 fw-bolder">
                                            Tonsils :
                                        </label>
                                        <input type="text" name="tonsils" id="tonsils" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h2>Cardiovascular System</h2>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="cardiovasular_pulse" class="pt-2 m-0 fw-bolder">
                                            Pulse :
                                        </label>
                                        <input type="text" name="cardiovasular_pulse" id="cardiovasular_pulse" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="neck" class="pt-2 m-0 fw-bolder">
                                            Rhythm :
                                        </label>
                                        <input type="text" name="cardiovasular_rhythm" id="cardiovasular_rhythm" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="cardiovasular_apex_beat" class="pt-2 m-0 fw-bolder">
                                            Apex beat :
                                        </label>
                                        <input type="text" name="cardiovasular_apex_beat" id="cardiovasular_apex_beat" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="cardiovasular_asculation" class="pt-2 m-0 fw-bolder">
                                            Auscultation :
                                        </label>
                                        <input type="text" name="cardiovasular_asculation" id="cardiovasular_asculation" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="cardiovasular_varicose_veins" class="pt-2 m-0 fw-bolder">
                                            Varicose Veins :
                                        </label>
                                        <input type="text" name="cardiovasular_varicose_veins" id="cardiovasular_varicose_veins" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                                <div class="row mt-5 mb-5">
                                    <div class="col-12">
                                        <h2>Respiratory System</h2>
                                        <h4>Lungs</h4>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="respiratory_lungs_r" class="pt-2 m-0 fw-bolder">
                                            Right :
                                        </label>
                                        <input type="text" name="respiratory_lungs_r" id="respiratory_lungs_r" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="respiratory_lungs_l" class="pt-2 m-0 fw-bolder">
                                            Left :
                                        </label>
                                        <input type="text" name="respiratory_lungs_l" id="respiratory_lungs_l" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="respiratory_breasts" class="pt-2 m-0 fw-bolder">
                                            Breasts :
                                        </label>
                                        <input type="text" name="respiratory_breasts" id="respiratory_breasts" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h2>Lung Function Test (SPIROMETRY)</h2>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="lung_fvc" class="pt-2 m-0 fw-bolder">
                                            FVC :
                                        </label>
                                        <input type="text" name="lung_fvc" id="lung_fvc" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="lung_fev1" class="pt-2 m-0 fw-bolder">
                                            FEV1 :
                                        </label>
                                        <input type="text" name="lung_fev1" id="lung_fev1" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="lung_fev1_fvc" class="pt-2 m-0 fw-bolder">
                                            FEV1/FVC :
                                        </label>
                                        <input type="text" name="lung_fev1_fvc" id="lung_fev1_fvc" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="remark" class="pt-2 m-0 fw-bolder">
                                            REMARK :
                                        </label>
                                        <input type="text" name="remark" id="remark" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 ms-2">
                                <button type="submit" id="save" class="btn btn-primary px-4 mt-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 mt-5" style="display:none;">
                    <form action="{{url('save_physical_examination_finding_2')}}" method="POST">
                        @csrf
                        <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket_no}}" />
                        <input type="hidden" name="patient_id" id="patient_id" value="{{$patient->id}}" />
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Digestive System </h2>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="abdomen" class="pt-2 m-0 fw-bolder">
                                            Abdomen :
                                        </label>
                                        <input type="text" name="abdomen" id="abdomen" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="liver" class="pt-2 m-0 fw-bolder">
                                            Liver :
                                        </label>
                                        <input type="text" name="liver" id="liver" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="spleen" class="pt-2 m-0 fw-bolder">
                                            Spleen :
                                        </label>
                                        <input type="text" name="spleen" id="spleen" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="hernia" class="pt-2 m-0 fw-bolder">
                                            Hernia :
                                        </label>
                                        <input type="text" name="hernia" id="hernia" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="others" class="pt-2 m-0 fw-bolder">
                                            Others :
                                        </label>
                                        <input type="text" name="others" id="others" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h2>Genito-urinary System</h2>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="kidneys" class="pt-2 m-0 fw-bolder">
                                            Kidneys :
                                        </label>
                                        <input type="text" name="kidneys" id="kidneys" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="genitalia" class="pt-2 m-0 fw-bolder">
                                            Genitalia :
                                        </label>
                                        <input type="text" name="genitalia" id="genitalia" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                                <div class="row mt-5 mb-5">
                                    <div class="col-12">
                                        <h2>Skeletal System</h2>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="skull" class="pt-2 m-0 fw-bolder">
                                            Skull :
                                        </label>
                                        <input type="text" name="skull" id="skull" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="spine" class="pt-2 m-0 fw-bolder">
                                            Spine :
                                        </label>
                                        <input type="text" name="spine" id="spine" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="extremities_upper" class="pt-2 m-0 fw-bolder">
                                            Extremities Upper :
                                        </label>
                                        <input type="text" name="extremities_upper" id="extremities_upper" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="spine" class="pt-2 m-0 fw-bolder">
                                            Extremities Lower :
                                        </label>
                                        <input type="text" name="extremities_lower" id="extremities_lower" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h2>Nervous System</h2>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="motor" class="pt-2 m-0 fw-bolder">
                                            Motor :
                                        </label>
                                        <input type="text" name="motor" id="motor" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="sensory" class="pt-2 m-0 fw-bolder">
                                            Sensory :
                                        </label>
                                        <input type="text" name="sensory" id="sensory" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="reflexes" class="pt-2 m-0 fw-bolder">
                                            Reflexes :
                                        </label>
                                        <input type="text" name="reflexes" id="reflexes" class="form-control " style="border-radius: 10px;">
                                    </div>

                                </div>

                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h2>Investigation</h2>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="cxr" class="pt-2 m-0 fw-bolder">
                                            CXR :
                                        </label>
                                        <input type="text" name="cxr" id="cxr" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="ecg" class="pt-2 m-0 fw-bolder">
                                            ECG :
                                        </label>
                                        <input type="text" name="ecg" id="ecg" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="usg_pelvis_abdomen" class="pt-2 m-0 fw-bolder">
                                            USG(pelvis and abdomen) :
                                        </label>
                                        <input type="text" name="usg_pelvis_abdomen" id="usg_pelvis_abdomen" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="usg_breast" class="pt-2 m-0 fw-bolder">
                                            USG(breast) :
                                        </label>
                                        <input type="text" name="usg_breast" id="usg_breast" class="form-control " style="border-radius: 10px;">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="pap_semer" class="pt-2 m-0 fw-bolder">
                                            PAP SEMER :
                                        </label>
                                        <input type="text" name="pap_semer" id="pap_semer" class="form-control " style="border-radius: 10px;">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="bone_scan" class="pt-2 m-0 fw-bolder">
                                            BONE SCAN :
                                        </label>
                                        <input type="text" name="bone_scan" id="bone_scan" class="form-control " style="border-radius: 10px;">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mt-3 ms-2">
                                <button type="submit" id="save" class="btn btn-primary px-4 mt-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12" style="display:none;">
                    <form action="{{url('save_diagnosis')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ticket_id" id="ticket_id" value="{{$ticket_no}}" />
                        <input type="hidden" name="patient_id" id="patient_id" value="{{$patient->id}}" />
                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="laboratory_tests" class="pt-3 m-0 fw-bolder">
                                        <h4>Laboratory tests :</h4>
                                    </label>
                                    <input type="file" name="laboratory_tests" id="laboratory_tests" class="form-control py-3" style="border-radius: 10px;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="imaging_studies" class="pt-3 m-0 fw-bolder">
                                        <h4>Imaging studies (X-rays, MRI, CT scans) :</h4>
                                    </label>
                                    <input type="file" name="imaging_studies" id="imaging_studies" class="form-control py-3" style="border-radius: 10px;">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="other_results" class="pt-3 m-0 fw-bolder">
                                        <h4>Other diagnostic procedures and their results :</h4>
                                    </label>
                                    <input type="file" name="other_results" id="other_results" class="form-control py-3" style="border-radius: 10px;">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-5">
                            <h2 class="mb-1">Diagnosis</h2>
                            <div class="row mt-2 pt-3">
                                <label for="primary_diagnosis">
                                    <h4>Primary Diagnosis </h4>
                                </label>
                                <div class="col-12">
                                    <textarea name="primary_diagnosis" id="primary_diagnosis" rows="6" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row mt-2 pt-3">
                                <label for="secondary_diagnosis">
                                    <h4>Secondary diagnoses if applicable</h4>
                                </label>
                                <div class="col-12">
                                    <textarea name="secondary_diagnosis" id="secondary_diagnosis" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4 ms-2">
                            <button type="submit" id="" class="btn btn-primary px-4 mt-2">Save</button>
                        </div>
                    </form>
                </div>

                <div class="col-12 mt-5" style="display:none;">
                    <h2 class="mb-3">Treatment Plan</h2>
                    <h4>Medications prescribed</h4>
                    <form action="{{route('treatment_plan_medical',$patient->id)}}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <input type="hidden" name="ticket_no" value="{{$ticket_no}}">
                            <table class="table table-bordered" style="width: 100%;" id="flight_table_2">
                                <thead style="background-color:#707070;color:white;">
                                    <tr class="item_header bg-gradient-directional-blue white">
                                        <th class="text-center">No
                                        </th>
                                        <th class="text-center">
                                            Route
                                        </th>
                                        <th class="text-center">Brand Name
                                        </th>
                                        <th class="text-center">Strength
                                        </th>
                                        <th class="text-center">Qty
                                        </th>
                                        <th class="text-center">Frequency
                                        </th>
                                        <th class="text-center">Start Date
                                        </th>
                                        <th class="text-center">End Date
                                        </th>
                                        <th class="text-center">Remark
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><input type='text' name='no[]' value="1" id="no-0" class="form-control text-center" readonly autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='route[]' id="route-0" class="form-control text-center" autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='brand_name[]' id="brand_name-0" class="form-control text-center" autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='strength[]' id="strength-0" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='qty[]' id="qty-0" class="form-control" autocomplete="off"></td>
                                        <td class="text-center"><input type='text' name='frequency[]' class="form-control" id="frequency-0" autocomplete="off"></td>
                                        <td class="text-center"><input type='date' name='start_date[]' class="form-control" id="start_date-0" autocomplete="off"></td>
                                        <td class="text-center"><input type='date' name='end_date[]' class="form-control" id="end_date-0" autocomplete="off"></td>
                                        <td class="text-center"><input type='text' name='remark[]' class="form-control" id="remark-0" autocomplete="off"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" id="save" class="btn btn-primary px-4 mt-2">Save</button>
                            <button id="add_row_2" type="button" class="btn btn-success px-4 mt-2">Add</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 mt-5" style="display:none;">
                    <h2 class="mb-3">Treatment Plan</h2>
                    <h4>Procedures recommended or performed</h4>
                    <form action="{{route('treatment_plan_procedure',$patient->id)}}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <input type="hidden" name="ticket_no" value="{{$ticket_no}}">
                            <table class="table table-bordered" style="width: 100%;" id="flight_table_1">
                                <thead style="background-color:#707070;color:white;">
                                    <tr class="bg-gradient-directional-blue white">
                                        <th class="text-center">No
                                        </th>
                                        <th class="text-center">
                                            Procedure
                                        </th>
                                        <th class="text-center">Attending Surgeon/ Physician
                                        </th>
                                        <th class="text-center">Assistant
                                        </th>
                                        <th class="text-center">Date
                                        </th>
                                        <th class="text-center">Start Time
                                        </th>
                                        <th class="text-center">End Time
                                        </th>
                                        <th class="text-center">Remarks
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><input type='text' name='no[]' value="1" id="no-0" class="form-control text-center" readonly autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='procedure[]' id="procedure-0" class="form-control text-center" autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='physician[]' id="physician-0" class="form-control text-center" autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='strength[]' id="strength-0" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='date' name='date[]' id="date-0" class="form-control" autocomplete="off"></td>
                                        <td class="text-center"><input type='text' name='start_time[]' class="form-control" id="start_time-0" autocomplete="off"></td>
                                        <td class="text-center"><input type='text' name='end_time[]' class="form-control" id="end_time-0" autocomplete="off"></td>
                                        <td class="text-center"><input type='text' name='remark[]' class="form-control" id="remark-0" autocomplete="off"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" id="save" class="btn btn-primary px-4 mt-2">Save</button>
                            <button id="add_row_1" type="button" class="btn btn-success px-4 mt-2">Add</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 mt-5" style="display:none;">
                    <form action="{{route('Referral_to_specialist',$patient->id)}}" method="POST">
                        @csrf
                        <div class="">
                            <label for="referrals_specialists">
                                <h4 class="mb-1">Referrals to specialists </h4>
                            </label>
                            <div class="row">
                                <input type="hidden" name="ticket_no" value="{{$ticket_no}}">
                                <div class="col-12">
                                    <textarea name="referals" id="referrals_specialists" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4 ms-2">
                            <button type="submit" id="" class="btn btn-primary px-4 mt-2">Save</button>
                        </div>
                    </form>
                </div>

                <div class="col-12 mt-5" style="display: none;">
                    <form action="{{route('follow_up_plan',$patient->id)}}" method="POST">
                        @csrf
                        <div class="">
                            <input type="hidden" name="ticket_no" value="{{$ticket_no}}">
                            <label for="follow_up_plan">
                                <h4 class="mb-1">Follow Up Plan</h4>
                            </label>
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="follow_up_plan" id="follow_up_plan" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4 ms-2">
                            <button type="submit" id="" class="btn btn-primary px-4 mt-2">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 mt-5" style="display:none;">
                    <h2 class="mb-3">Medical Visit </h2>
                    <h4>Response to treatment</h4>
                    <form action="{{route('medical_visit',$patient->id)}}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <input type="hidden" name="ticket_no" value="{{$ticket_no}}">
                            <table class="table table-bordered" style="width: 100%;" id="flight_table">
                                <thead style="background-color:#707070;color:white;">
                                    <tr class="bg-gradient-directional-blue white">
                                        <th class="text-center">Date
                                        </th>
                                        <th class="text-center">
                                            Progress
                                        </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><input type='date' name='date[]' id="date-0" class="form-control" autocomplete="off">
                                        </td>
                                        <td class="text-center"><input type='text' name='progress[]' id="progress-0" class="form-control" autocomplete="off"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" id="save" class="btn btn-primary px-4 mt-2">Save</button>
                            <button id="add_row" type="button" class="btn btn-success px-4 mt-2">Add</button>
                        </div>
                    </form>
                </div>
                <form action="{{route("mo_remark",$patient->id)}}" method="POST" style="display:none;">
                    @csrf
                    <div class="col-12 mt-5">
                        <h2 class="mb-1">MO Remark</h2>
                        <input type="hidden" name="ticket_id" id="ticket_id">
                        <div class="row pt-3">
                            <div class="col-12">
                                <textarea name="mo_remark2" id="mo_remark2" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4 ms-2">
                        <button type="submit" id="" class="btn btn-primary px-4 mt-2">Save</button>
                    </div>
                </form>

                {{-- <div class="col-12 mt-4">
                    <a href="{{route("home")}}" id="" class="btn btn-primary px-4 mt-2 float-end">Close</a>
            </div> --}}
    </div>
    </div>
    </section>
    </div>

    @include('landing_page.base')

    <script>
        $(document).ready(function() {
            let rowCount = $("#flight_table_2 tr").length - 1; // Initialize row count
            // let id_no_1 = 2;
            $('#add_row').click(function() {
                var html = '<tr>' +
                    '<td class="text-center"><input type="date" name="date[]" class="form-control" id="date-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" name="progress[]" class="form-control" id="progress-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button></td>' +
                    '</tr>';
                $('#flight_table tbody').append(html);
                rowCount++; // Increment row count
                // id_no_1++;
            });
            $(document).on('click', '.remove_row', function() {
                $(this).closest('tr').remove();
                // id_no_1--;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let rowCount = $("#flight_table_2 tr").length - 1; // Initialize row count

            $('#add_row_1').click(function() {
                let id_no_2 = $("#flight_table_1 tr").length + 0;
                var html = '<tr>' +
                    '<td class="text-center"><input type="text" id="no" name="no[]" value="' + id_no_2 +
                    '" class="form-control text-center" autocomplete="off" readonly></td>' +
                    '<td class="text-center"><input type="text" id="procedure-' + rowCount +
                    '" name="procedure[]" class="form-control" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" id="physician-' + rowCount +
                    '" name="physician[]" class="form-control" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" id="strength-' + rowCount +
                    '" name="strength[]" class="form-control" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="date" name="date[]" class="form-control" id="date-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" name="start_time[]" class="form-control" id="start_time-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" name="end_time[]" class="form-control" id="end_time-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" name="remark[]" class="form-control" id="remark-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button></td>' +
                    '</tr>';
                $('#flight_table_1 tbody').append(html);
                rowCount++; // Increment row count
                // id_no_2++;
            });
            $(document).on('click', '.remove_row', function() {
                $(this).closest('tr').remove();
                $('#flight_table_1 tr').each(function(index) {
                    $(this).find('#no').val(index);
                    // console.log($(this).find('#no').val());
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let rowCount = $("#flight_table_2 tr").length - 1;; // Initialize row count
            // let id_no_3 = 2;
            $('#add_row_2').click(function() {

                let id_no_3 = $("#flight_table_2 tr").length + 0;
                var html = '<tr>' +
                    '<td class="text-center"><input type="text" id="no" name="no[]" value="' + id_no_3 +
                    '" class="form-control text-center" autocomplete="off" readonly></td>' +
                    '<td class="text-center"><input type="text" id="route-' + rowCount +
                    '" name="route[]" class="form-control" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" id="brand_name-' + rowCount +
                    '" name="brand_name[]" class="form-control" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" id="strength-' + rowCount +
                    '" name="strength[]" class="form-control" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" name="qty[]" class="form-control" id="qty-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" name="frequency[]" class="form-control" id="frequency-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="date" name="start_date[]" class="form-control" id="start_date-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="date" name="end_date[]" class="form-control" id="end_date-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><input type="text" name="remark[]" class="form-control" id="remark-' +
                    rowCount + '" autocomplete="off"></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-danger remove_row">Remove</button></td>' +
                    '</tr>';
                $('#flight_table_2 tbody').append(html);
                rowCount++; // Increment row count
                // id_no_3++;
            });
            $(document).on('click', '.remove_row', function() {
                $(this).closest('tr').remove();
                $('#flight_table_2 tr').each(function(index) {
                    $(this).find('#no').val(index);
                    // console.log($(this).find('#no').val());
                });
            });
        });
    </script>

    @include('landing_page.footer_section')
