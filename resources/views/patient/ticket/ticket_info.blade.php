@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">
        <section class="container-fluid">
            <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-lg-8 p-0">
                    <div class="card">
                        <div class="mt-5">
                            <h1 class="card-title text-center">Ticket Information</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-center">
                                    <div class="border d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ဘိုကင်နံပါတ်</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ERS_0001</h4>
                                        </div>
                                    </div>
                                    <div class="border d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ဆရာဝန်အမည်</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ဒေါက်တာစောထူး</h4>
                                        </div>
                                    </div>
                                    <div class="border d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ဆေးရုံအမည်</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ပန်းလှိုင်ဆေးရုံ</h4>
                                        </div>
                                    </div>
                                    <div class="border d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ဆေးရုံလိပ်စာ</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">လှိုင်သာယာ</h4>
                                        </div>
                                    </div>
                                    <div class="border d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">Chief Complaint</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">ကျောက်ကပ်ဆေးခြင်း</h4>
                                        </div>
                                    </div>
                                    <div class="border d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">Date</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">21.1.24</h4>
                                        </div>
                                    </div>
                                    <div class="border d-flex justify-content-between align-items-center">
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">Next Appointment Date</h4>
                                        </div>
                                        <div class="col-6">
                                            <h4 class="px-3 py-4 m-0">21.2.24</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-end p-3">
                            <a href="{{route('home')}}" class="btn btn-primary btn-lg">နောက်သို့</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    @include('landing_page.footer_section')
