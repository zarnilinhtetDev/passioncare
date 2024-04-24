@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif; height:100vh;">
        @include('landing_page.nav')
        <section class="container">


            <div class="d-flex align-items-center justify-content-center" style="min-height: 70vh;">
                <div class="card" style="width: 70rem">
                    <div class="card-body m-5">
                        <div class="mb-4">
                            <label for="name">
                                <h3>ဆေးခန်းပြလိုသည့် အကြောင်းအရာ :</h3>
                            </label>
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="name">
                                <h3>ဆေးစာနှင့် ဆေးစစ်ချက်များတင်ရန် :</h3>
                            </label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{url('/home')}}" class="btn btn-danger btn-lg me-4">မလုပ်တော့ပါ။</a>
                            <button type="submit" class="btn btn-primary btn-lg ms-4">တင်သွင်းမည်။</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal End --}}
        </section>


        @include('landing_page.footer_section')