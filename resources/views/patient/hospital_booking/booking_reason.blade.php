@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif; height:100vh;">
        @include('landing_page.nav')
        <section class="container">


            <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">
                <div class="card" style="width: 70rem">
                    <div class="card-body m-5">
                        <form action="{{ url('patient_health_record_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="name">
                                    <h3>ဆေးခန်းပြလိုသည့် အကြောင်းအရာ :</h3>
                                </label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="name">
                                    <h3>ဆေးစာနှင့် ဆေးစစ်ချက်များတင်ရန် :</h3>
                                </label>
                                <input type="file" class="form-control" name="file_name">
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{url('/home')}}" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ။</a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်။</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- <footer id="bottom-nav"> -->
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
            {{-- Modal End --}}
        </section>


        @include('landing_page.footer_section')
