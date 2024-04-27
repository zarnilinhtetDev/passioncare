@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('plugins/cubeportfolio/css/register.css') }}">

<div class="container">
    <div class="row center-container mx-auto">
        <div class="col-10 col-md-6 py-4 px-2 px-md-5 border-color-all" style="border-radius: 20px;background-color: #F0F5F9;">
            <!-- Adjust the column width as needed -->
            <h1 class="text-center" style="color: #2297BE; font-size:50px;">ERS</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Form content goes here -->
                <div class="btn-group col-12 mb-3" style="height: 50px;">
                    <a href="#" class="btn center-text text-white" style="background-color: #2297BE;">Login</a>
                    <a href="#" class="btn center-text border-color-all" style="background-color: #DAECF2; color:#2297BE;">Register</a>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <div class="input-group mt-1">
                        <span class="input-group-text border-color"><i class="fa-solid fa-user"></i></span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Email</label>
                    <div class="input-group mt-1">
                        <span class="input-group-text border-color"><i class="fa-solid fa-square-phone"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span class="input-group-text border-color" id="eye1" style="background-color: white !important; cursor:pointer;"><i class="fa-solid fa-eye" id="eye-open1"></i></span>
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
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <span class="input-group-text border-color" id="eye2" style="background-color: white !important; cursor:pointer;"><i class="fa-solid fa-eye" id="eye-open2"></i></span>
                    </div>
                </div>

                <button type="submit" class="btn form-control text-white mb-3" style="font-weight: bold; background-color:#2297BE;">CREATE ACCOUNT</button>

                <div class="text-with-lines mb-3">
                    <span class="text-in-line px-2 px-md-4" style="font-weight:bold;">or Register with</span>
                </div>

                <button type="button" class="btn form-control border-color-all mb-2"><img src="{{ asset('img/googlelogo.jpg') }}" alt="google logo" width="30px" height="30px" style="border-radius: 100%;">&nbsp;&nbsp;&nbsp;Continue with google</button>

                <div class="form-group" style="display: flex; align-items: center;">
                    <input type="checkbox" class="" name="terms" placeholder="">&nbsp;&nbsp;
                    <span for="terms">I agree to the <span class="text-primary">Terms of Use</span> and the <span class="text-primary">Privacy Policy</span>
                        for my account.</span>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    const passwordField = document.getElementById('password');
    const passwordConfirm = document.getElementById('password-confirm');
    const toggleEyeButton1 = document.getElementById('eye1');
    const toggleEyeButton2 = document.getElementById('eye2');
    const eyeIcon1 = document.getElementById('eye-open1');
    const eyeIcon2 = document.getElementById('eye-open2');

    toggleEyeButton1.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon1.classList.remove('fa-eye');
            eyeIcon1.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
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