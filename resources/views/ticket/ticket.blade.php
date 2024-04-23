@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif; height:100vh;" class="justify-content-end">
        @include('landing_page.nav')
        <section class="container">

            <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
                <div class="">
                    <div class="card" style="width: 100rem;">
                        <div class="cade-header mt-5 mx-auto">
                            <h1 class="cade-title text-center">Ticket Information</h1>
                        </div>
                        <div class="card-body">
                            {{-- <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                              </div>
                              <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-10 offset-1 border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ဘိုကင်နံပါတ်</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ERS_0001</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1 border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ဆရာဝန်အမည်</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ဒေါက်တာစောထူး</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1 border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ဆေးရုံအမည်</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ပန်းလှိုင်ဆေးရုံ</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1 border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ဆေးရုံလိပ်စာ</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">လှိုင်သာယာ</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1 border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">Chief Complaint</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">ကျောက်ကပ်ဆေးခြင်း</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1 border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">Date</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">21.1.24</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 offset-1 border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">Next Appointment Date</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="px-5 py-3">21.2.24</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end p-3">
                            <a href=""><button type="button" class="btn btn-primary btn-lg">နောက်သို့</button></a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    {{-- Modal End --}}
    </section>
    </div>

    @include('landing_page.footer_section')