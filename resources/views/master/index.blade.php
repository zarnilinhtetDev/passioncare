{{-- header --}}
@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        @include('landing_page.nav')

        @include('landing_page.slide_image')

        @include('landing_page.smallSlide')
        <!-- Section: boxes -->
        <section class="mt-5">
            <div class="container mt-5">
                <div class="row d-flex flex-column flex-md-row align-items-center justify-content-center gap-2 gap-lg-0">
                    <div class="wow-box">
                        <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                            <i class="fa fa-check fa-3x text-white pb-3 pt-2"></i>
                            <div class="font pb-2 text-white fs-3" style="font-weight: bold;">ဆရာဝန်နဲ့ တိုင်ပင်ဆွေးနွေးရန်</div>
                        </div>
                    </div>
                    <div class="wow-box">
                        <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                            <i class="fa fa-list-alt fa-3x text-white pb-3 pt-2"></i>
                            <div class="font pb-2 text-white fs-3" style="font-weight: bold">ဆေးရုံဆေးခန်း ဘိုကင်တင်ရန်</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="">

                        @if ($patient)
                        <div class="card text-box">
                            <div class="card-body textboxText text-center lh-lg">
                                ဆရာဝန်နှင့် တိုင်ပင်ဆွေးနွေးရန် ချိန်းဆိုထားပါသည်။ <br>
                                သင်ရှေ့တွင် လူနာ (၅) ဦးရှိပါသဖြင့် ခန့်မှန်းကြာချိန် ( ) နာရီ ( ) မိနစ်စောင့်ဆိုင်းရမည် ဖြစ်ပါသည်။ <br>
                                ဆရာဝန်မှ ဖုန်းဖြင့်ပြန်လည်ဆက်သွယ်ပေးမည်ဖြစ်ပါ၍ ခေတ္တစောင့်ဆိုင်းပေးပါရန် အသိပေးအပ်ပါသည်။
                            </div>

                        </div> @else
                        <div class="card pop-box">
                            <div class="card-body textboxText text-center lh-lg">
                                လတ်တလော အချက်အလက်များ မရှိသေးပါ။ သင့်တွင် ခံစားနေရသော ရောဂါလက္ခဏာများရှိလျှင် ဆရာဝန်နှင့်တိုင်ပင်ဆွေးနွေးရန်
                                ယခုပဲဆက်သွယ်ပါ။ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('reason') }}" class="btn justify-content-end" style="background-color:#2297BE;color:white">ဆက်သွယ်မည်</a>
                            </div>
                        </div>
                        <div class="card pop-box my-2">
                            <div class="card-body textboxText text-center lh-lg">
                                ဆေးရုံ၊ ဆေးခန်း ဘိုကင်တင်ရန်အခက်အခဲရှိပါက ERS မှတာဝန်ယူဆောင်ရွက်ပေးမည် ဖြစ်ပါသည်။&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('booking_req') }}" class="btn justify-content-end" style="background-color:#2297BE;color:white">ဆက်သွယ်မည်</a>
                            </div>


                        </div>
                        @endif
                    </div>
                </div>

        </section>


        {{-- Tabs with table Section --}}
        <div id="exTab1" class="container mt-5">

            <h3>Medical History</h3>


            <div class="tab-content clearfix ">
                <div class="tab-pane active mt-5">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="myTable">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">No.</th>
                                            <th style="background-color: #FAF9F6" scope="col">Ticket ID</th>
                                            <th style="background-color: #FAF9F6" scope="col">Doctor Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Hospital Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Chief Complaint</th>
                                            <th style="background-color: #FAF9F6" scope="col">Last Date</th>
                                            <th style="background-color: #FAF9F6" scope="col">Next Appointment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">ERS-00001</a>
                                            </td>
                                            <td>Dr.Saw Htoo</td>
                                            <td>Pan Hlaing (Hlaing Thar Yar)</td>
                                            <td>ကျောက်ကပ်ဆေးခြင်း</td>
                                            <td>22-02-24</td>
                                            <td>22-01-24</td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- footer section --}}
        <footer style="background-color: black;font-size: 15px" class="mt-5">

            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5 class="text-white" style="font-size: 15px;">About Medicio</h5>
                                <p class="text-white">
                                    Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi
                                    accommodare sea
                                </p>
                            </div>
                        </div>
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5 class="text-white" style="font-size: 15px;">Information</h5>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Laboratory</a></li>
                                    <li><a href="#">Medical treatment</a></li>
                                    <li><a href="#">Terms & conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5 class="text-white" style="font-size: 15px;">Medicio center</h5>
                                <p class="text-white">
                                    Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                                </p>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                        </span> <span class="text-white">Monday - Saturday, 8am to 10pm</span>
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                        </span> <span class="text-white">+62 0888 904 711</span>
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                        </span> <span class="text-white">hello@medicio.com</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5 class="text-white" style="font-size: 15px;">Our location</h5>
                                <p class="text-white">The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

                            </div>
                        </div>
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5 class="text-white" style="font-size: 15px;">Follow us</h5>
                                <ul class="company-social">
                                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a>
                                    </li>
                                    <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </footer>

        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

        <footer id="bottom-nav">
            <div class="bottom-nav" style="background-color: #337AB7">
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
        </footer>
    </div>

    <style>

    </style>

    @include('landing_page.footer_section')