@include('landing_page.header_section')

<body class="bg-light" id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style=" font-family: Arial, Helvetica, sans-serif;">
        @include('landing_page.nav')
        <section class="container-fluid">
            <div class="d-flex align-items-center justify-content-center" style="min-height: 40vh;">
                <div class="col-6 col-lg-4 p-0">
                    <div class="card shadow">
                        <div class="mt-5">
                            <h4 class="card-title text-center">ကျေးဇူးတင်ပါသည်</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">သင်၏ ဘိုကင်နံပါတ်သည် {{$ticket_no}} ဖြစ်ပါသည်။</h4>
                            <div class=" d-flex justify-content-center p-3">
                                <a href="{{route('home')}}" class="btn btn-lg text-white" style="background-color: #123093">Close</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class=" d-flex justify-content-end p-3">
                        <a href="{{route('home')}}" class="btn btn-primary btn-lg">Close</a>
                    </div> -->
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
    <!-- </footer> -->
    </div>
    @include('landing_page.footer_section')
