{{-- header --}}
@include('landing_page.header_section')
<style>
    .wowInfo {
        background: #4accd1;
    }

    .wowInfo:hover {
        background-color: #87dde1;
    }
</style>


<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;" class="justify-content-end">

        @include('landing_page.nav')

        @include('landing_page.slide_image')

        @include('landing_page.smallSlide')
        <!-- Section: boxes -->
        @if (Auth::user()->type == 'patient')
        <section class="mt-5">
            <div class="container mt-5">
                <div class="row d-flex flex-column flex-md-row align-items-center justify-content-center gap-2 gap-lg-0">
                    <div class="wow-box">
                        <a href="{{ url('reason', $patient->id) }}" style="text-decoration: none;">
                            <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                                <i class="fa fa-check fa-3x text-white pb-3 pt-2"></i>
                                <div class="font pb-2 text-white fs-3" style="font-weight: bold;">ဆရာဝန်နဲ့
                                    တိုင်ပင်ဆွေးနွေးရန်
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="wow-box">
                        <a href="{{ url('booking_req', $patient->id) }}" style="text-decoration: none;">
                            <div class="wow wowInfo fadeInUp bg-skin d-flex flex-column align-items-center justify-content-center" data-wow-delay="0.2s">
                                <i class="fa fa-list-alt fa-3x text-white pb-3 pt-2"></i>
                                <div class="font pb-2 text-white fs-3" style="font-weight: bold">ဆေးရုံဆေးခန်း
                                    ဘိုကင်တင်ရန်
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section class="container-fluid mt-5 mb-5">
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-8 p-0">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-center my-4">
                                <div class="border rounded-4 d-flex justify-content-center align-items-center">
                                    <marquee behavior="" direction="left" scrolldelay="2" scrollamount="9">
                                        <h3 class="py-4">
                                            <b>ဆရာဝန်မှ သင့်အား ဆေးရုံ/ဆေးခန်းပြသရန် အောက်ပါအတိုင်း ရက်ချိန်းယူထားပေးပြီး ဖြစ်ပါသည်။</b>
                                        </h3>
                                    </marquee>

                                </div>
                            </div>
                            <div class="col-12 col-sm-10 offset-sm-1 d-flex flex-column text-center">
                                @if ($booking_data->token_no == null)
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ဘိုကင်နံပါတ်</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <h3 class="px-3 py-4 m-0 text-left">{{ $booking_data->booking_no }}</h3>
                                    </div>
                                </div>
                                @else
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">တိုကင်နံပါတ်</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <h3 class="px-3 py-4 m-0 text-left">{{ $booking_data->token_no }}</h3>
                                    </div>
                                </div>
                                @endif
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ဆရာဝန်အမည်</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <h3 class="px-3 py-4 m-0 text-left">{{ $booking_data->doctor_name }}</h3>
                                    </div>
                                </div>
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ဆေးရုံအမည်</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <h3 class="px-3 py-4 m-0 text-left">{{ $booking_data->hospital_name }}</h3>
                                    </div>
                                </div>
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ဆေးရုံလိပ်စာ</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <h3 class="px-3 py-4 m-0 text-left">
                                            {{ $booking_data->hospital_address ?? $mo_hospitals->hospital_address }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ဆေးရုံတည်နေရာလင့်</h3>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-5">
                                        <div class="input-group px-md-5">
                                            <input type="hospital_google_address_link" class="form-control" id="hospital_google_address_link" name="hospital_google_address_link" value="{{ $booking_data->hospital_google_address_link ?? $mo_hospitals->hospital_google_address_link }}" placeholder="Enter Google Address Link" style="font-size:14px;font-weight:bold;text-align:center;">
                                            <button type="button" id="copyLinkBtn" class="btn btn-primary">
                                                <i class="fa-solid fa-paperclip"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ပြသလိုသည့် အကြောင်းအရာ</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <h3 class="px-3 py-4 m-0 text-left">{{ $booking_data->description }}</h3>
                                    </div>
                                </div>
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ဘိုကင်စတင်ပြုလုပ်သည့်နေ့</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <h3 class="px-3 py-4 m-0 text-left">
                                            {{ $booking_data->created_at->format('d-m-Y') }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="border rounded-4 d-flex justify-content-between align-items-center">
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                        <h3 class="px-3 py-4 m-0 text-left">ဆေးရုံသို့သွားရမည့်နေ့</h3>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        @if ($booking_data->date != null)
                                        <h3 class="px-3 py-4 m-0 text-left">{{ $date_format->format('d-m-Y') }}
                                        </h3>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="d-flex justify-content-center">
            <iframe id="map" class="mt-5" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15272.152786368106!2d96.09777651794431!3d16.874004943117995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1714551109428!5m2!1smy!2smm" style="border:0; width:80vw; height:450px; margin-bottom:10px; margin-top:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

    <script>
        document.getElementById("copyLinkBtn").addEventListener("click", function() {
            var copyText = document.getElementById("hospital_google_address_link");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        });
    </script>