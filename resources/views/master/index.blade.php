{{-- header --}}
@include('landing_page.header_section')
<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #example-1_filter {
        text-align: left;
    }

    #example-1_info {
        text-align: left;
    }

    #example-1_paginate {
        text-align: left;
    }

    body {
        font-size: 130%;
    }

    .btn {
        padding: 0.50rem 1.3rem;
        font-size: 1.10rem;
    }
</style>
<style>
    .alert {
        display: none;
        background-color: #fff3cc;
        color: #000;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;"
        class="justify-content-end">

        @include('landing_page.nav')

        @include('landing_page.slide_image')

        @include('landing_page.smallSlide')
        <!-- Section: boxes -->
        <section class="mt-5">
            <div class="container mt-5">
                <div class="row d-flex flex-column flex-md-row align-items-center justify-content-center gap-2 gap-lg-0">

                    @if (!empty($patient))
                        <div class="wow-box">
                            <a href="{{ url('reason') }}" style="text-decoration: none;">
                                <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center"
                                    data-wow-delay="0.2s">
                                    <i class="fa fa-check fa-3x text-white pb-3 pt-2"></i>
                                    <div class="font pb-2 text-white fs-3" style="font-weight: bold;">ဆရာဝန်နဲ့
                                        တိုင်ပင်ဆွေးနွေးရန်</div>
                                </div>
                            </a>
                        </div>

                        <div class="wow-box">
                            <a href="{{ url('booking_req') }}" style="text-decoration: none;">
                                <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center"
                                    data-wow-delay="0.2s">
                                    <i class="fa fa-list-alt fa-3x text-white pb-3 pt-2"></i>
                                    <div class="font pb-2 text-white fs-3" style="font-weight: bold">ဆေးရုံဆေးခန်း
                                        ဘိုကင်တင်ရန်</div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="">

                        @if ($patient)
                            <div class="card text-box">
                                <div class="card-body textboxText text-center lh-lg">
                                    ဆရာဝန်နှင့် တိုင်ပင်ဆွေးနွေးရန် ချိန်းဆိုထားပါသည်။ <br>
                                    သင်ရှေ့တွင် လူနာ (၅) ဦးရှိပါသဖြင့် ခန့်မှန်းကြာချိန် ( ) နာရီ ( )
                                    မိနစ်စောင့်ဆိုင်းရမည် ဖြစ်ပါသည်။ <br>
                                    ဆရာဝန်မှ ဖုန်းဖြင့်ပြန်လည်ဆက်သွယ်ပေးမည်ဖြစ်ပါ၍ ခေတ္တစောင့်ဆိုင်းပေးပါရန်
                                    အသိပေးအပ်ပါသည်။
                                </div>

                            </div>
                        @else
                            <div class="alert" id="alertBox">
                                <div class="d-flex">
                                    <strong class="col-11 text-center">
                                        User information is not complete!
                                    </strong>
                                    <a href="#" class="text-dark" onclick="hideAlert()"><i
                                            class="fa-solid fa-x"></i></a>
                                </div>
                            </div>
                            <div class="card pop-box">
                                <div class="card-body textboxText text-center lh-lg">
                                    လတ်တလော အချက်အလက်များ မရှိသေးပါ။ သင့်တွင် ခံစားနေရသော ရောဂါလက္ခဏာများရှိလျှင်
                                    ဆရာဝန်နှင့်တိုင်ပင်ဆွေးနွေးရန်
                                    ယခုပဲဆက်သွယ်ပါ။ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @if ($patient)
                                        <a href="{{ url('reason') }}" class="btn justify-content-end"
                                            style="background-color:#2297BE;color:white">ဆက်သွယ်မည်</a>
                                    @else
                                        <a onclick="showAlert()" href="#" class="btn justify-content-end"
                                            style="background-color:#2297BE;color:white">ဆက်သွယ်မည်</a>
                                    @endif
                                </div>
                            </div>
                            <div class="card pop-box my-2">
                                <div class="card-body textboxText text-center lh-lg">
                                    ဆေးရုံ၊ ဆေးခန်း ဘိုကင်တင်ရန်အခက်အခဲရှိပါက ERS မှတာဝန်ယူဆောင်ရွက်ပေးမည်
                                    ဖြစ်ပါသည်။&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @if ($patient)
                                        <a href="{{ url('booking_req') }}" class="btn justify-content-end"
                                            style="background-color:#2297BE;color:white">ဆက်သွယ်မည်</a>
                                    @else
                                        <a onclick="showAlert()" href="#" class="btn justify-content-end"
                                            style="background-color:#2297BE;color:white">ဆက်သွယ်မည်</a>
                                    @endif
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
                                            <th style="background-color: #FAF9F6" scope="col">Next Appointment Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td scope="row">1</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">ERS-00001</a>
                                                </td>
                                                <td>{{ $booking->doctor_name }}</td>
                                                <td>{{ $booking->hospital_name }}</td>
                                                <td>{{ $booking->description }}</td>
                                                <td>{{ $booking->date }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <iframe id="map" class="mt-5"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15272.152786368106!2d96.09777651794431!3d16.874004943117995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1714551109428!5m2!1smy!2smm"
                        style="border:0; width:100vw; height:450px; margin-bottom:10px; margin-top:20px;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

    </div>
    @include('landing_page.base')

    @include('landing_page.footer_section')

    <script>
        function showAlert() {
            var alertBox = document.getElementById("alertBox");
            alertBox.style.display = "block"; // Show the alert box
        };

        function hideAlert() {
            var alertBox = document.getElementById("alertBox");
            alertBox.style.display = "none"; // Hide the alert box
        }
    </script>
