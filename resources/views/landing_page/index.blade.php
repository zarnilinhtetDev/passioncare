{{-- header --}}
@include('main.header_section')
<style>
    @media (max-width: 768px) {
        #myCarousel {
            margin-left: 0;
        }

        .navbar-expand-lg {
            display: none;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bottom-nav {
            display: flex;
            justify-content: space-around;
            background-color: #333;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 1000;
        }

        .bottom-nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        .bottom-nav a i {
            font-size: 24px;
        }
    }
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper" style="background-color: #ffffff; font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        {{-- navbar --}}
       <nav class="navbar navbar-expand-lg bg-body-tertiary">


            <div class="row" style="background-color: #337AB7; position: fixed; width: 100%; z-index: 1000; padding: 5px 10px; font-size: 12px;border-radius:0;">
                <div class="col-2">
                    <div class="">
                        <h4 class="text-white pt-3">Easy Referral System </h4>
                    </div>
                </div>
                <div class="col-8">

                        <ul class="navbar nav-fill" style="list-style: none; text-decoration:none; border-bottom:none;">
                            <li class="nav-item">
                            <a class="nav-link text-white fs-4" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white fs-4" href="#">Hospital</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white fs-4" href="#">Doctors</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer !important">
                            <a class="nav-link text-white fs-4">Our Services</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer !important">
                                <a class="nav-link text-white fs-4">Activity</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer !important">
                            <a class="nav-link text-white fs-4">About us</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer !important">
                            <a class="nav-link text-white fs-4">Map</a>
                            </li>
                            <li class="nav-item" style="cursor: pointer !important">
                            <a class="nav-link text-white fs-4">Help</a>
                            </li>
                        </ul>

                </div>
                <div class="col-2">
                    <div class="d-flex pt-4">
                        <div>
                            <a class="text-white" href=""><i class="fa fa-comment fa-1x"></i></a>
                            <a class="mx-3 text-white" href=""><i class="fa fa-bell fa-1x"></i></a>
                        </div>
                        <div class="nav-item dropdown col">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-white">{{ auth()->user()->name }}</span>
                            </a>

                            <div class="dropdown-menu" style="background-color: #F0F5F9">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="p-1 btn changelogout" style="width: 140px">
                                        <span class="text-dark">Logout</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </nav>


        {{-- slide image banner section --}}
        <section>
            <div class="container-fluid image-banner">

                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-ride-interval="1000">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img id="image" class="img"
                                src="https://c8.alamy.com/comp/2AT7Y9Y/female-doctor-smiling-on-the-background-with-patient-in-the-bed-and-two-doctors-2AT7Y9Y.jpg"
                                alt="Los Angeles">
                            <div id="caption" class="carousel-caption d-md-block">
                                <h5 id="title" style="color: #158CB7; font-weight: bold;">
                                    Full Body Check today</h5>
                                <p id="text" style="font-weight: bold;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Quo totam eos nesciunt consequatur? Et voluptates natus
                                </p>
                            </div>
                        </div>

                        <div class="item">
                            <img id="image" class="img"
                                src="https://t4.ftcdn.net/jpg/03/20/52/31/360_F_320523164_tx7Rdd7I2XDTvvKfz2oRuRpKOPE5z0ni.jpg"
                                alt="Chicago">
                            <div class="carousel-caption d-md-block">
                                <h5 id="title"
                                    style="color: #158CB7; font-weight: bold;font-family: 'Poppins', sans-serif;">
                                    Full Body Check today</h5>
                                <p id="text" style="font-weight: bold;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Quo totam eos nesciunt consequatur? Et voluptates natus
                                </p>
                            </div>
                        </div>

                        <div class="item">
                            <img id="image" class="img"
                                src="https://img.freepik.com/premium-photo/portrait-mature-male-doctor-wearing-white-coat-standing-hospital-corridor_562859-3453.jpg"
                                alt="New york">
                            <div class="carousel-caption d-md-block">
                                <h5 id="title"
                                    style="color: #158CB7; font-weight: bold;font-family: 'Poppins', sans-serif;">
                                    Full Body Check today</h5>
                                <p id="text" style="font-weight: bold;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Quo totam eos nesciunt consequatur? Et voluptates natus
                                </p>
                            </div>
                        </div>
                    </div>


                    <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>


        {{-- small slide section --}}
        <section class="mt-5">
            <div class="container mt-5">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="card col-md-6 swiper-slide"
                            style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Medicine Delivery</div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col"
                                            src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg"
                                            alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp"
                                                    alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide"
                            style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Weight Management Program
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col"
                                            src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg"
                                            alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp"
                                                    alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide"
                            style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">On Your First Consultation
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col"
                                            src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg"
                                            alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp"
                                                    alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide"
                            style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Ayushman Vital Health
                                    Check</div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col"
                                            src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg"
                                            alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp"
                                                    alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide"
                            style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Ayushman Vital Health
                                    Check</div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col"
                                            src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg"
                                            alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp"
                                                    alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section: boxes -->
        <section class="mt-5">
            <div class="container mt-5">
                <div class="row d-flex flex-column flex-md-row align-items-center justify-content-center gap-2 gap-lg-0">
                    <div class="wow-box" style="                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                n border-radius: 10px;">
                        <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                            <i class="fa fa-check fa-3x circled pt-2"></i>
                            <div class="font pb-2 text-white fs-3" style="font-weight: bold;">ဆရာဝန်နဲ့ တိုင်ပင်ဆွေးနွေးရန်</div>
                        </div>
                    </div>
                    <div class="wow-box">
                        <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                            <i class="fa fa-list-alt fa-3x circled pt-2"></i>
                            <div class="font pb-2 text-white fs-3" style="font-weight: bold">ဆေးရုံဆေးခန်း ဘိုကင်တင်ရန်</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="card text-box">
                        <div class="card-body fs-3 text-center lh-lg">
                            ဆရာဝန်နှင့် တိုင်ပင်ဆွေးနွေးရန် ချိန်းဆိုထားပါသည်။ <br>
                            သင်ရှေ့တွင် လူနာ (၅) ဦးရှိပါသဖြင့် ခန့်မှန်းကြာချိန် (  ) နာရီ  (  ) မိနစ်စောင့်ဆိုင်းရမည် ဖြစ်ပါသည်။ <br>
                            ဆရာဝန်မှ ဖုန်းဖြင့်ပြန်လည်ဆက်သွယ်ပေးမည်ဖြစ်ပါ၍ ခေတ္တစောင့်ဆိုင်းပေးပါရန် အသိပေးအပ်ပါသည်။
                        </div>
                    </div>
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
                    <i class="fa fa-angle-up">
                    <i class="fa fa-arrow-up"></i>
                </a>

            </div>
        </footer>
    </div>

    <style>
        #image{
            width: 80% !important;
            border-radius: 0% !important;
        }
        .wow-box{
            width: 50% !important;
            height: 150px !important;
        }
        .wowInfo{
            width: 100% !important;
            height: 100% !important;
        }
        .text-box{
            height: 150px !important;
            width: 100% !important
        }
        #myCarousel{
            margin: 0 !important;
        }
        .item{
            border-radius: 0% !important;
        }
        @media only screen and (max-width:1440px){
        .changelogout{
            width: 130px !important;
            
        }
        }
        @media only screen and (max-width:1024px){
        .changelogout{
            width: 100px !important;
            /* margin-right: 5px !important; */
        }
        }
        @media only screen and (max-width:768px){
        .wow-box{
            width: 100% !important;
            height: 120px !important;
        }
        }
        @media only screen and (max-width:425px){
        .text-box{
            height: 200px !important;
        }}
        @media only screen and (max-width:320px){
        .text-box{
            height: 270px !important;
        }
        }
    </style>

    @include('main.footer_section')
