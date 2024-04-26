{{-- header --}}
@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        @include('landing_page.nav')

        @include('landing_page.slide_image')

        @include('landing_page.smallSlide')


        {{-- Patient table Section --}}
        <div id="exTab1" class="container mt-5 pb-5">

            <h3>All Patient</h3>

            <a href="#" class="btn btn-primary btn-lg mt-4">Add Patient</a>

            <div class="tab-content clearfix ">
                <div class="tab-pane active mt-5">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="myTable">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">No.</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Address</th>
                                            <th style="background-color: #FAF9F6" scope="col">Created Date</th>
                                            <th style="background-color: #FAF9F6" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Yangon</td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary">Create Ticket</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Yangon</td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary">Create Ticket</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Yangon</td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary">Create Ticket</a>
                                            </td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="justify-content-end d-flex">
                                <a href="">view more</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Booking Request table Section --}}
        <div id="exTab1" class="container mt-5 pb-5">

            <h3>Booking Request</h3>

            <div class="tab-content clearfix ">
                <div class="tab-pane active mt-5">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="myTable">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">No.</th>
                                            <th style="background-color: #FAF9F6" scope="col">MO ID</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">ဆေးခန်းပြသလိုသော အကြောင်းအရာ</th>
                                            <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                            <th style="background-color: #FAF9F6" scope="col" class="text-center">Consultation</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Agent 1</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Lorem Ipsum is a type of placeholder </td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success">View Ticket</a>
                                                <a href="#" class="btn btn-warning">Edit Ticket</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Agent 2</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Lorem Ipsum is a type of placeholder </td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success">View Ticket</a>
                                                <a href="#" class="btn btn-warning">Edit Ticket</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Agent 3</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Lorem Ipsum is a type of placeholder </td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success">View Ticket</a>
                                                <a href="#" class="btn btn-warning">Edit Ticket</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Add more rows as needed -->

                                    </tbody>
                                </table>
                            </div>
                            <div class="justify-content-end d-flex">
                                <a href="">view more</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Tabs with table Section --}}
        <div id="exTab1" class="container mt-5 pb-5">

            {{-- <div class="row justify-content-between">
                    <div class="col-12 col-sm-10" style="background: #fff;">
                        <ul class="nav nav-pills">
                            <li class="active text-center mx-sm-auto fs-3"  id="mo_li">
                                <a class="tabs" href="#1a" data-toggle="tab" id="mo_slide">Incoming Patient</a>
                            </li>
                            <li class="text-center mx-sm-auto fs-3"  id="mo_li"><a class="tabs" href="#2a" data-toggle="tab" id="mo_slide">MO Ongoing</a>
                            </li>
                            <li class="text-center mx-sm-auto fs-3"  id="mo_li"><a class="tabs" href="#3a" data-toggle="tab" id="mo_slide">Hospital Ongoing</a>
                            </li>
                            <li class="text-center mx-sm-auto fs-3"  id="mo_li"><a class="tabs" href="#4a" data-toggle="tab" id="mo_slide">Admin Review</a>
                            </li>
                            <li class="text-center mx-sm-auto fs-3"  id="mo_li"><a class="tabs" href="#5a" data-toggle="tab" id="mo_slide">Completed</a>
                            </li>
                        </ul>
                    </div>
                 </div> --}}
            {{-- <div class="card">
                    <ul class="nav nav-pills">
                        <li class="active text-center fs-3" id="mo_li">
                                <a class="tabs" href="#1a" data-toggle="tab" id="mo_slide">Incoming Patient</a>
                            </li>
                            <li class="text-center mx-sm-auto fs-3" id="mo_li"><a class="tabs" href="#2a" data-toggle="tab" id="mo_slide">MO Ongoing</a>
                            </li>
                            <li class="text-center mx-sm-auto fs-3" id="mo_li"><a class="tabs" href="#3a" data-toggle="tab" id="mo_slide">Hospital Ongoing</a>
                            </li>
                            <li class="text-center mx-sm-auto fs-3" id="mo_li"><a class="tabs" href="#4a" data-toggle="tab" id="mo_slide">Admin Review</a>
                            </li>
                            <li class="text-center fs-3" id="mo_li"><a class="tabs" href="#5a" data-toggle="tab" id="mo_slide">Completed</a>
                            </li>
                    </ul>
                </div> --}}

            <div class="">
                <ul style="border: 1px solid gray; border-radius:5px;" class="nav nav-pills nav-fill">
                    <li class=" li active text-center" id="mo_li"><a class="tabs" href="#1a" data-toggle="tab" id="mo_slide">Incoming Patient</a></li>
                    <li class="li text-center" id="mo_li"><a class="tabs" href="#2a" data-toggle="tab" id="mo_slide">MO Ongoing</a></li>
                    <li class="li text-center" id="mo_li"><a class="tabs" href="#3a" data-toggle="tab" id="mo_slide">Hospital Ongoing</a></li>
                    <li class="li text-center " id="mo_li"><a class="tabs" href="#4a" data-toggle="tab" id="mo_slide">Admin Review</a></li>
                    <li class=" li text-center " id="mo_li"><a class="tabs com" href="#5a" data-toggle="tab" id="mo_slide">Completed</a></li>
                </ul>
            </div>

            {{-- <div class="table-responsive" style="overflow-y: auto;">
                    <table class="table table-bordered table-striped mt-5" id="myTable">
                        <tr>
                            <td style="background-color: #fff !important" scope="col"><a class="tabs" href="#1a" data-toggle="tab" id="mo_slide">Incoming Patient</a></td>
                            <td style="background-color: #fff !important" scope="col"><a class="tabs" href="#2a" data-toggle="tab" id="mo_slide">MO Ongoing</a></td>
                            <td style="background-color: #fff !important" scope="col"><a class="tabs" href="#3a" data-toggle="tab" id="mo_slide">Hospital Ongoing</a></td>
                            <td style="background-color: #fff !important" scope="col"><a class="tabs" href="#4a" data-toggle="tab" id="mo_slide">Admin Review</a></td>
                            <td style="background-color: #fff !important" scope="col"><a class="tabs" href="#5a" data-toggle="tab" id="mo_slide">Completed</a>
                        </tr>
                    </table>
                </div> --}}

            <div class="tab-content clearfix">
                <div class="tab-pane active mt-5" id="1a">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="myTable">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">No</th>
                                            <th style="background-color: #FAF9F6" scope="col">MO ID</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                            <th style="background-color: #FAF9F6" scope="col" class="text-center">Consultation</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Agent 1</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Lorem Ipsum is a type of placeholder </td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary"> Call Patient </a>
                                            </td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="justify-content-end d-flex">
                                <a href="">view more</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane mt-5" id="2a">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="myTable1">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">Ticket No</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                            <th style="background-color: #FAF9F6" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary button" type="button">Ticket
                                                    1</button>
                                            </td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09123456789</td>
                                            <td>Lorem Ipsum is a type of placeholder </td>
                                            <td>22-02-24</td>
                                            <td>
                                                Assign MO
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="justify-content-end d-flex">
                                    <a href="">view more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane mt-5" id="3a">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="example1">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">Ticket No</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Dr.Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Appointment Date</th>
                                            <th style="background-color: #FAF9F6" scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary button" type="button">Ticket
                                                    1</button>
                                            </td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09123456789</td>
                                            <td>Dr. Naing Zaw</td>
                                            <td>22-02-24</td>
                                            <td>
                                                Assign MO
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="justify-content-end d-flex">
                                    <a href="">view more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane mt-5" id="4a">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="example1">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">Ticket No</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Completed Date</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary button" type="button">Ticket
                                                    1</button>
                                            </td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09123456789</td>
                                            <td>Lorem Ipsum is a type of placeholder</td>
                                            <td>22-02-24</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="justify-content-end d-flex">
                                    <a href="">view more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane mt-5" id="5a">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="myTable">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">No</th>
                                            <th style="background-color: #FAF9F6" scope="col">MO ID</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                            <th style="background-color: #FAF9F6" scope="col" class="text-center">Consultation</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Agent 1</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09-754239736</td>
                                            <td>Lorem Ipsum is a type of placeholder </td>
                                            <td>22-02-24</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary"> Call Patient </a>
                                            </td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="justify-content-end d-flex">
                                <a href="">view more</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    @include('landing_page.base')

    @include('landing_page.footer_section')

    {{-- <style>
    @media only screen and (max-width:768px) {

    }
</style> --}}