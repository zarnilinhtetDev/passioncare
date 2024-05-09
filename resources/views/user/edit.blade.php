@include('landing_page.header_section')

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper" style="background-color: #F0F5F9; font-family: Arial, Helvetica, sans-serif;">
        @include('landing_page.nav')
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center d-flex">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible show" role="alert">
                            <strong class="text-center mx-auto">{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        {{-- @if (auth()->user()->type !== '2') --}}
                        <!-- left column -->
                        <div class="col-md-8 mb-5">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">User Register</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('userUpdate', $userData->id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="login_type" name="login_type" value="{{ auth()->user()->type }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Name" required autofocus name="name" value="{{ $userData->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $userData->email }}" required>
                                        </div>

                                        @if (auth()->user()->type !== '2')
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="patient" @if ($userData->type === 'Patient') selected @endif>Patient
                                                </option>
                                                <option value="mo" @if ($userData->type === 'mo') selected @endif>Mo</option>
                                                <option value="hospital" @if ($userData->type === 'hospital') selected @endif>Hospital
                                                </option>
                                            </select>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label for="level">level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option value="1" @if ($userData->type === '1') selected @endif>level 1</option>
                                                <option value="2" @if ($userData->type === '2') selected @endif>level 2</option>
                                                <option value="3" @if ($userData->type === '3') selected @endif>level 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" class="" id="pass_check" name="pass_check">
                                            <label for="pass_check">Click here to change password</label>
                                        </div>
                                        <div class="form-group" style="display:none;" id="password_field">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="new-password">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('user') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </form>


                            </div>
                        </div>
                        {{-- @endif --}}

                    </div>
                </div>

            </section>

        </div>
    </div>
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
    {{-- @include('landing_page.base') --}}
    <script>
        const newPassCheck = document.getElementById('pass_check');
        const passwordField = document.getElementById('password_field');
        newPassCheck.addEventListener('change', function() {
            if (this.checked) {
                passwordField.style.display = 'block';
            } else {
                passwordField.style.display = 'none';
            }
        });
    </script>
    @include('landing_page.footer_section')