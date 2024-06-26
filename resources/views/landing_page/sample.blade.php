{{-- header --}}
@include('landing_page.header_section')
<style>
    @media (max-width: 767px) {
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

    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">

        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #337AB7; position: fixed; width: 100%; z-index: 1000; padding: 5px 10px; font-size: 12px;border-radius:0;">
            <div class="container-fluid">
                <a class="navbar-brand custom-font col" href="#" style="background: linear-gradient(45deg, #337AB7, #3a89eb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    <img style="width: 20%;" src="" alt="" class="m-1"><span style="font-size: 15px"></span>
                </a>
                <a class="text-white" href=""><i class="fa fa-comment fa-1x"></i></a>
                <a class="mx-3 text-white" href=""><i class="fa fa-bell fa-1x"></i></a>
                <div class="btn-group mx-5">

                    <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-white">{{ auth()->user()->name }}</span>
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                    </div>
                    <div class="dropdown-menu" style="background-color: #F0F5F9">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-1 btn changelogout " style="width: 148px">
                                <span class="text-dark">Logout</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>






        {{-- slide image banner section --}}
        <section>
            <div class="container">

                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-ride-interval="1000" style="width: 110%;margin-left: -6%">
                    <!-- Indicators -->
                    {{-- <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol> --}}


                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img id="image" src="https://c8.alamy.com/comp/2AT7Y9Y/female-doctor-smiling-on-the-background-with-patient-in-the-bed-and-two-doctors-2AT7Y9Y.jpg" alt="Los Angeles">
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
                            <img id="image" src="https://t4.ftcdn.net/jpg/03/20/52/31/360_F_320523164_tx7Rdd7I2XDTvvKfz2oRuRpKOPE5z0ni.jpg" alt="Chicago">
                            <div class="carousel-caption d-md-block">
                                <h5 id="title" style="color: #158CB7; font-weight: bold;font-family: 'Poppins', sans-serif;">
                                    Full Body Check today</h5>
                                <p id="text" style="font-weight: bold;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Quo totam eos nesciunt consequatur? Et voluptates natus
                                </p>
                            </div>
                        </div>

                        <div class="item">
                            <img id="image" src="https://img.freepik.com/premium-photo/portrait-mature-male-doctor-wearing-white-coat-standing-hospital-corridor_562859-3453.jpg" alt="New york">
                            <div class="carousel-caption d-md-block">
                                <h5 id="title" style="color: #158CB7; font-weight: bold;font-family: 'Poppins', sans-serif;">
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
        <section style="margin-top: 5%">
            <div class="container mt-5">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="card col-md-6 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Medicine Delivery</div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col" src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg" alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp" alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Weight Management Program
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col" src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg" alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp" alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">On Your First Consultation
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col" src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg" alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp" alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Ayushman Vital Health
                                    Check</div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col" src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg" alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp" alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card col-md-6 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row g-0 card-body">
                                <div class="offer-type" title="Ayushman Vital Health Check">Ayushman Vital Health
                                    Check</div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <button class="offer-highlight col" style="font-size: 55%;height: 40px;">Up to
                                            20% Off</button>
                                        <img class="col" src="https://www.mfine.co/wp-content/themes/Divi/new-assets/icons/Arrow.svg" alt="arrows" width="40%" height="40px" loading="lazy">
                                        <div class="col d-flex justify-content-end">
                                            <div class="offer-img">
                                                <img src="https://dg0qqklufr26k.cloudfront.net/wp-content/uploads/2023/12/downloadFromDb-6-1.webp" alt="Offer Image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="swiper-pagination"></div> --}}
                </div>
            </div>
        </section>

        <!-- Section: boxes -->
        <section style="margin-top: 10%">
            <div class="container mt-5">
                <div class="d-flex align-items-center justify-content-around flex-wrap ">
                    <div class="boxes">
                        <div class="wow fadeInUp text-center" data-wow-delay="0.2s">
                            <i class="fa fa-check fa-3x circled bg-skin"></i>
                            <div class="font" style="font-weight: bold;">Patient List</div>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="wow fadeInUp text-center" data-wow-delay="0.2s">
                            <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                            <div class="font" style="font-weight: bold">Medical Record</div>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="wow fadeInUp text-center" data-wow-delay="0.2s">
                            <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                            <div class="font" style="font-weight: bold">Appointment</div>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="wow fadeInUp text-center" data-wow-delay="0.2s">
                            <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                            <div class="font" style="font-weight: bold">User Guide</div>
                        </div>
                    </div>
                    <div class="boxes" id="map">
                        <div class="wow fadeInUp text-center" data-wow-delay="0.2s">
                            <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                            <div class="font" style="font-weight: bold">Map</div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        {{-- Tabs with table Section --}}
        <div id="exTab1" class="container" style="margin-top: 8%">

            <ul class="nav nav-pills d-flex align-items-center justify-content-around flex-wrap">
                <li class="active li">
                    <a class="tabs" href="#1a" data-toggle="tab">All Patient</a>
                </li>
                <li class="li"><a class="tabs" href="#2a" data-toggle="tab">Upcoming Patient</a>
                </li>
                <li class="li"><a class="tabs" href="#3a" data-toggle="tab">Ongoing Patient</a>
                </li>
                <li class="li"><a class="tabs" href="#4a" data-toggle="tab">Completed Patient</a>
                </li>
            </ul>


            <div class="tab-content clearfix ">
                <div class="tab-pane active mt-5" id="1a">
                    <div class="card shadow" style="background-color: #F0F5F9">
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto;">
                                <table class="table table-bordered table-striped mt-5" id="myTable">
                                    <thead class="thead">
                                        <tr>
                                            <th style="background-color: #FAF9F6" scope="col">No</th>
                                            <th style="background-color: #FAF9F6" scope="col">Patient Name</th>
                                            <th style="background-color: #FAF9F6" scope="col">Phone Number</th>
                                            <th style="background-color: #FAF9F6" scope="col">Description</th>
                                            <th style="background-color: #FAF9F6" scope="col">Last Update</th>
                                            <th style="background-color: #FAF9F6" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>U Kyaw Kyaw Win</td>
                                            <td>09123456789</td>
                                            <td>Lorem Ipsum is a type of placeholder</td>
                                            <td>22-02-24</td>
                                            <td>
                                                <a class="btn btn-primary button" type="button">Discuss With MO</a>
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
            </div>
        </div>

        {{-- top hospital section --}}
        <section style="margin-top: 5%">
            <div class="container mt-5">
                <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="section-heading">
                        <h2 class="hospital">Top Hospital</h2>
                    </div>
                </div>
                <div class="swiper mySwiper1">
                    <div class="swiper-wrapper">
                        <div class="col-md-4 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="person-text rel text-dark">
                                        <img id="swiper-image" style="border-radius: 10%" src="https://myanmartravel.com/images/2020/06/Shwe-Gon-Dine-SSC-Specialist-Centre.jpg" alt="" class="person" />
                                        <a id="swiper-text" class="text-dark" title="" href="#">SSC</a>
                                        {{-- <span>Chicago, Illinois</span> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="person-text rel text-dark">
                                        <img id="swiper-image" style="border-radius: 10%" src="https://cdn.myanmarseo.com/file/client-cdn/gnlm/wp-content/uploads/2022/12/1644-sskm.jpg" alt="" class="person" />
                                        <a id="swiper-text" class="text-dark" title="" href="#">ရန်ကုန်ပြည်သူဆေးရုံကြီး</a>
                                        {{-- <span>San Antonio, Texas</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="person-text rel text-dark">
                                        <img id="swiper-image" style="border-radius: 10%" src="https://myanmartravel.com/images/2020/06/Shwe-Gon-Dine-SSC-Specialist-Centre.jpg" alt="" class="person" />
                                        <a id="swiper-text" class="text-dark" title="" href="#">SSC</a>
                                        {{-- <span>Chicago, Illinois</span> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="person-text rel text-dark">
                                        <img id="swiper-image" style="border-radius: 10%" src="https://cdn.myanmarseo.com/file/client-cdn/gnlm/wp-content/uploads/2022/12/1644-sskm.jpg" alt="" class="person" />
                                        <a id="swiper-text" class="text-dark" title="" href="#">ရန်ကုန်ပြည်သူဆေးရုံကြီး</a>
                                        {{-- <span>San Antonio, Texas</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="person-text rel text-dark">
                                        <img id="swiper-image" style="border-radius: 10%" src="https://myanmartravel.com/images/2020/06/Shwe-Gon-Dine-SSC-Specialist-Centre.jpg" alt="" class="person" />
                                        <a id="swiper-text" class="text-dark" title="" href="#">SSC</a>
                                        {{-- <span>Chicago, Illinois</span> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 swiper-slide" style="background-color: #F0F5F9;border-radius: 10px;width: 500px">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="person-text rel text-dark">
                                        <img id="swiper-image" style="border-radius: 10%" src="https://cdn.myanmarseo.com/file/client-cdn/gnlm/wp-content/uploads/2022/12/1644-sskm.jpg" alt="" class="person" />
                                        <a id="swiper-text" class="text-dark" title="" href="#">ရန်ကုန်ပြည်သူဆေးရုံကြီး</a>
                                        {{-- <span>San Antonio, Texas</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="swiper-pagination"></div> --}}
                </div>
            </div>
        </section>

        {{-- our service section --}}
        <section style="margin-top: 8%">
            {{-- <div class="container marginbot-50" style="margin-top: 5%">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">

                    </div>
                </div>
            </div> --}}
            <div class="container">
                <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="section-heading">
                        <h2 class="our-service">Our Service</h2>
                    </div>
                </div>
                <div class="mt-5 d-flex align-items-center justify-content-around flex-wrap">
                    <div class="service">
                        <div class="partner card shadow" style="background-color: #CFECF5;border-radius: 15px">
                            <div class="card-body">
                                <div>Consultation</div>
                                <a href="#" class="mx-2"><img style="width: 25%" src="https://drdfox.com/wp-content/uploads/2023/03/Consult-image.png" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="service">
                        <div class="partner card shadow " style="background-color: #CFECF5;border-radius: 15px">
                            <div class="card-body">
                                <div>Lab Tests</div>
                                <a href="#" class="mx-2"><img style="width: 25%" src="https://drdfox.com/wp-content/uploads/2023/03/Consult-image.png" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="service1">
                        <div class="partner card shadow " style="background-color: #CFECF5;border-radius: 15px">
                            <div class="card-body">
                                <div>Health Package</div>
                                <a href="#" class="mx-2"><img style="width: 25%" src="https://drdfox.com/wp-content/uploads/2023/03/Consult-image.png" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="service1">
                        <div class="partner card shadow" style="background-color: #CFECF5;border-radius: 15px">
                            <div class="card-body">
                                <div>Scans & X-Rays</div>
                                <a href="#" class="mx-2"><img style="width: 25%" src="https://drdfox.com/wp-content/uploads/2023/03/Consult-image.png" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- location section --}}
        <section style="margin-top: 8%" id="location">
            <div class="mt-5 justify-content-center d-flex">
                <iframe class="location" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15277.507476593084!2d96.18452180000001!3d16.807649799999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1709693418058!5m2!1smy!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        {{-- footer section --}}
        <footer style="margin-top: 5%;background-color: black;font-size: 15px">

            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5 class="text-white" style="font-size: 15px;">About Medicio</h5>
                                <p>
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
                                <p>
                                    Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                                </p>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                        </span> Monday - Saturday, 8am to 10pm
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                        </span> +62 0888 904 711
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                        </span> hello@medicio.com
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5 class="text-white" style="font-size: 15px;">Our location</h5>
                                <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

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
                <a href="{{ url('/') }}">
                    <i class="fas fa-home"></i>
                    Home
                </a>
                @if (Auth::user()->type == 'mo')
                <a class="nav-link text-white" href="{{ url('/mo_hospital') }}"><i class="fa-solid fa-hospital"></i>Hospital</a>
                @else
                <a class="nav-link text-white" href="{{ url('/hospital') }}"><i class="fa-solid fa-hospital"></i>Hospital</a>
                @endif
                <div class="dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-white"><i class="fa-solid fa-user"></i> {{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu " style="background-color: #F0F5F9;">
                        @if (Auth::user()->type == 'mo')
                        <a class="p-1 btn changelogout text-dark" href="{{ url('user') }}" style="width: 50px">User</a>
                        @else
                        <a href="{{ url('/profile') }}" class="p-1 btn changelogout" style="width: 30px">Profile</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-1 btn changelogout" style="width: 50px">
                                <span class="text-dark">Logout</span></button>
                        </form>
                    </div>
                </div>
                @if (Auth::user()->type == 'mo')
                <a class="nav-link text-white" href="{{ url('/mo_doctor') }}"><i class="fa-solid fa-user-doctor"></i>Doctor</a>
                @else
                <a class="nav-link text-white" href="{{ url('/doctor') }}"><i class="fa-solid fa-user-doctor"></i>Doctor</a>
                @endif
                <a href="#">
                    <i class="fas fa-heart"></i>
                    Favorites
                </a>
                <a href="#" class="text-dark">
                    <i class="fa fa-arrow-up"></i>
                </a>
            </div>
        </footer>














    </div>


    @include('landing_page.footer_section')