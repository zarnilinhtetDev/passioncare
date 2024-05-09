@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" class="doctorDetail" style="font-size: 16px;">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">

                <div class="card container-fluid">
                    <section class="content-header">
                        <div class="container">
                            <div class="row mb-4 mt-5">
                                <div class="col-6">
                                    <h1 class="text-primary">Doctor Detail</h1>
                                </div>
                                <div class="col-6">

                                    <div class="d-flex justify-content-end">
                                        <a href="{{route('doctor#doctor_edit',$doctors->id)}}" class="btn btn-lg btn-success">Edit</a>
                                        <a href="{{ route('doctor') }}" class="btn btn-lg btn-primary ms-4">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="content container mb-5">

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card shadow bg-body rounded p-2 mb-md-5 mt-5">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group d-flex justify-content-center">
                                                <img src="{{ asset('img/photo/6.jpg') }}" class="rounded-circle mt-5 mb-4 doctorPro" style="width: 140px; height: 140px;">
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Name</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">
                                                    {{ $doctors->doctor_name }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Phone Number</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{ $doctors->phone_number }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">City</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{ $doctors->city }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Date of Birth</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">12.1.2000</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Gender</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{ $doctors->gender }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Medical License</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{ $doctors->medical_license }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Degree</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{ $doctors->degree }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Specialization</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{ $doctors->doctor_specialities }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Other Certification</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{ $doctors->other_certification }}</span>
                                            </div>
                                            <div class="col-md-12 form-group row" class="dt_span">
                                                <span class="col-5 fw-bold text-end">Work Experience</span>
                                                <span class="col-2 fw-bold text-center">:</span>
                                                <span class="col-5 fw-bold text-start">{{$doctors->work_experiance}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 mb-md-5">
                                <div class="card shadow mt-5 p-2 bg-body rounded">
                                    <h3 class="card-title text-bold">History</h3>
                                    <div class="card-body">

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Ticket ID</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">Ticket 1</a>
                                                    </td>
                                                    <td>Assign Mo</td>
                                                    <td>22-02-24</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        {{-- Table End --}}
                                    </div>

                                </div>
                                <div class="card shadow mt-5 p-2 bg-body rounded">
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Hospital Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($doctor2 as $doctor)
                                                <tr>
                                                    <td>{{ $doctor->no }}</td>
                                                    <td>{{ $doctor->hospitalname }}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- Table End --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </section>

        </div>

    </div>

    @include('landing_page.base')

    @include('landing_page.footer_section')
    <script>
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                order: [
                    [0, 'desc']
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column (action column) from export
                    }
                }],
                pageLength: 3
            });
        });
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                order: [
                    [0, 'desc']
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column (action column) from export
                    }
                }],
                pageLength: 3
            });
        });
    </script>