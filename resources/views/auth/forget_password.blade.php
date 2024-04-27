@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container my-auto">
        <div class="row d-flex justify-content-center align-items-center mx-auto" style="height: 80vh;">
            <div class="col-12 col-sm-11 col-md-10 col-lg-6 py-4 px-2 px-md-5 border-color-all"
                style="border-radius: 20px;"> <!-- Adjust the column width as needed -->
                <h3 class="fw-bold" style="font-size:25px;">Forgotten Password</h3>
                <p class="fs-6">Enter your phone number and we'll send you an OTP code to reset your password.</p>
                <form>
                    @csrf
                    <div class="form-group mb-4">
                        <label class="text-primary fw-bold" for="name">Phone Number</label>
                        <div class="input-group mt-2">
                            <span class="input-group-text" style="border:1px solid #2297BE; border-right:0px !important;"><i
                                    class="fa-solid fa-square-phone"></i></span>
                            <input type="phone" class="form-control" name="phone" placeholder="+95-9xxxxxxxxx"
                                aria-label="phone number"
                                style="height: 50px !important;border:1px solid #2297BE; border-left:0px;">
                        </div>
                    </div>

                    <a type="submit" class="btn form-control text-white d-flex align-items-center justify-content-center"
                        style="font-weight: bold; background-color:#2297BE;height:50px;border-radius:10px;">SEND RESET
                        LINK</a>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
