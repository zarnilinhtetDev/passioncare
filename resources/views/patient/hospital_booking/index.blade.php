@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif; height:100vh;">
        @include('landing_page.nav')
        <section class="container">

            <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
                <div class="card" style="width: 70rem">
                    <div class="card-body m-5">
                        <form action="{{url('booking_save')}}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <label for="name" class=" col-md-3">
                                    <h3>အမည် :</h3>
                                </label>
                                <input type="text" class=" form-control col fs-4" id="customer_name" placeholder="Enter Name" required autofocus name="customer_name" value="{{auth()->user()->name}}">
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ဆေးရုံအမည် :</h3>
                                </label>
                                <!-- <input type="text" class="form-control col fs-4" id="hospital_name" placeholder="Enter Name" required autofocus name="hospital_name"> -->
                                <select name="hospital_name" class="form-control col fs-4" id="hospital_name">
                                    <option value="" selected disabled>ဆေးရုံရွေးပါ</option>
                                    @foreach ( $hospitals as $hospital)
                                    <option value="{{ $hospital->id }}">{{$hospital->hospital_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ဆရာဝန်အမည် :</h3>
                                </label>
                                <select name="hospital_name" class="form-control col fs-4" id="hospital_name" required>
                                    <option value="" selected disabled>ဆရာဝန်ရွေးပါ</option>
                                    @foreach ( $doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{$doctor->doctor_name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>အထူးကု :</h3>
                                </label>
                                <input type="text" class="form-control col fs-4" id="specilist" placeholder="Enter Name" required autofocus name="specilist">
                            </div>
                            <div class="row mb-4">
                                <label for="name" class="col-md-3">
                                    <h3>ပြသလိုသော အကြောင်းအရာ :</h3>
                                </label>
                                <textarea class="form-control col fs-4" name="description" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{route('home')}}"><button type="button" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ</button></a>
                                <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Modal End --}}
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

        @include('landing_page.footer_section')
