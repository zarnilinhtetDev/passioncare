@extends('layouts.app')



@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('plugins/cubeportfolio/css/login.css') }}">

    <div class="container">
        <div class="row center-container mx-auto">
            <div class="col-10 col-lg-6 py-4 px-2 px-md-5 border-color-all" style="border-radius: 20px;">
                <!-- Adjust the column width as needed -->
                <h1 class="text-center" style="color: #2297BE; font-size:50px;">ERS</h1>
                <div class="btn-group col-12 mb-3" style="height: 50px;">
                    <a href="#" id="login-btn" class="btn center-text text-white border-color-all active"
                        style="background-color:#2297BE;">Login</a>
                    <a href=" #" id="register-btn" class="btn center-text text-white border-color-all"
                        style="background-color:#2297BE;">Register</a>
                </div>
                <form id="login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Email</label>
                        <div class="input-group mt-1">
                            <span class="input-group-text border-color"><i class="fa-solid fa-square-phone"></i></span>
                            <input type="phone"
                                class="form-control border-start-0 border-color @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Password</label>
                        <div class="input-group mt-1">
                            <span class="input-group-text border-color"><i class="fa-solid fa-lock"></i></span>
                            <input type="password"
                                class="form-control border-start-0 border-end-0 border-color @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="current-password">
                            <span class="input-group-text border-color" id="eye"
                                style="background-color: white !important; cursor:pointer;"><i class="fa-solid fa-eye"
                                    id="eye-open"></i></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn form-control text-white "
                        style="font-weight: bold; background-color:#2297BE;">Login</button>

                    <div class="form-group" style="display: flex; align-items: center; justify-content:space-between;">
                        <div class="" style="display: flex; align-items: center;">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>&nbsp;
                            <span id="remember_password">Remember Password</span>
                        </div>
                        <div class="" style="text-align:right;">
                            <a href="{{ url('forget_password') }}" class="text-danger " id="forget_password">Forget
                                Password?</a>
                        </div>
                    </div>

                    <div class="text-with-lines mb-3">
                        <span class="text-in-line px-2 px-md-4" style="font-weight:bold;">or Login with</span>
                    </div>



                </form>

                <form method="POST" action="{{ route('register') }}" id="register" style="display:none;">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <div class="input-group mt-1">
                            <span class="input-group-text border-color"><i class="fa-solid fa-user"></i></span>
                            <input type="text"
                                class="form-control border-start-0 border-color @error('name') is-invalid @enderror"
                                name="name" placeholder="Mg xxxxxxxxxx" aria-label="name" value="{{ old('name') }}"
                                required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <div class="input-group mt-1">
                            <span class="input-group-text border-color"><i class="fa-solid fa-square-phone"></i></span>
                            <input type="phone"
                                class="form-control border-start-0 border-color @error('email') is-invalid @enderror"
                                aria-label="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Password</label>
                        <div class="input-group mt-1">
                            <span class="input-group-text border-color"><i class="fa-solid fa-lock"></i></span>
                            <input type="password"
                                class="form-control border-start-0 border-end-0 border-color @error('password') is-invalid @enderror"
                                id="reg-password" placeholder="" aria-label="password" name="password" required
                                autocomplete="new-password">
                            <span class="input-group-text border-color" id="eye1"
                                style="background-color: white !important; cursor:pointer;"><i class="fa-solid fa-eye"
                                    id="eye-open1"></i></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Confirm Password</label>
                        <div class="input-group mt-1">
                            <span class="input-group-text border-color"><i class="fa-solid fa-lock"></i></span>
                            <input id="password-confirm" type="password"
                                class="form-control border-start-0 border-end-0 border-color" name="password_confirmation"
                                required autocomplete="new-password">
                            <span class="input-group-text border-color" id="eye2"
                                style="background-color: white !important; cursor:pointer;"><i class="fa-solid fa-eye"
                                    id="eye-open2"></i></span>
                        </div>
                    </div>

                    <button type="submit" class="btn form-control text-white mb-3"
                        style="font-weight: bold; background-color:#2297BE;">CREATE ACCOUNT</button>

                    <div class="text-with-lines mb-3">
                        <span class="text-in-line px-2 px-md-4" style="font-weight:bold;">or Register with</span>
                    </div>



                </form>
                <a href="{{ url('auth/google') }}" class="btn form-control text-primary border-color-all mb-2"><img
                        src="{{ asset('img/googlelogo.jpg') }}" alt="google logo" width="30px" height="30px"
                        style="border-radius: 100%;">&nbsp;&nbsp;&nbsp;Continue with google</a>
                <div class="form-group" style="display: flex; align-items: center;">
                    <input type="checkbox" class="" name="terms" placeholder="">&nbsp;&nbsp;
                    <span for="terms">I agree to the <span class="text-primary">Terms of Use</span> and the <span
                            class="text-primary">Privacy Policy</span>
                        for my account.</span>
                </div>
            </div>
        </div>
    </div>



    <script>
        const loginBtn = document.getElementById('login-btn');
        const registerBtn = document.getElementById('register-btn');
        const loginForm = document.getElementById('login');
        const registerForm = document.getElementById('register');

        loginBtn.addEventListener('click', function() {
            registerForm.style.display = 'none';
            loginForm.style.display = 'block';
            registerBtn.classList.remove('active');
            loginBtn.classList.add('active');
        });

        registerBtn.addEventListener('click', function() {
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');
        });

        //password eye btn for login
        const passwordField = document.getElementById('password');
        const toggleEyeButton = document.getElementById('eye');
        const eyeIcon = document.getElementById('eye-open');
        toggleEyeButton.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });

        //password eye btn for register
        const regPasswordField1 = document.getElementById('reg-password');
        const passwordConfirm = document.getElementById('password-confirm');
        const toggleEyeButton1 = document.getElementById('eye1');
        const toggleEyeButton2 = document.getElementById('eye2');
        const eyeIcon1 = document.getElementById('eye-open1');
        const eyeIcon2 = document.getElementById('eye-open2');

        toggleEyeButton1.addEventListener('click', function() {
            if (regPasswordField1.type === 'password') {
                regPasswordField1.type = 'text';
                eyeIcon1.classList.remove('fa-eye');
                eyeIcon1.classList.add('fa-eye-slash');
            } else {
                regPasswordField1.type = 'password';
                eyeIcon1.classList.remove('fa-eye-slash');
                eyeIcon1.classList.add('fa-eye');
            }
        });

        toggleEyeButton2.addEventListener('click', function() {
            if (passwordConfirm.type === 'password') {
                passwordConfirm.type = 'text';
                eyeIcon2.classList.remove('fa-eye');
                eyeIcon2.classList.add('fa-eye-slash');
            } else {
                passwordConfirm.type = 'password';
                eyeIcon2.classList.remove('fa-eye-slash');
                eyeIcon2.classList.add('fa-eye');
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
