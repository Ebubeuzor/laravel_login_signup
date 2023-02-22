<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
</head>
<body>

    <main id="main-area">

        <!-- register area -->
        <section id="register" class="login-con">
            <div id="row" class="row m-0">
                <div class="register-con ">
                    <div class="text-center pd-5">
                        <h1 class="login-title text-dark" >Login</h1>
                        <p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
                        <span class="p-1 m-0 font-ubuntu text-black-50">Create a new <a href="{{ route('auth.register') }}">Account</a> </span>
                    </div>
                    <div class="upload-profile-image d-flex justify-content-center pd-5">
                        <div class="text-center">
                            <img src=" {{ asset('userProfile/luser.png') }} " alt="profile" class="img rounded-circle" />
                        </div>
                    </div>
                    <div class="login-form">
                        <form method="post" action=" {{ route('auth.check') }} " enctype="multipart/form-data">
                            @csrf
                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <span class="text-danger textD">@error('email'){{ $message }}  @enderror</span>

                            <div class="form-row my-4">
                                <div class="col abs">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    <div class="img-con eyebtn">
                                        <img src=" {{ asset('images/eye-solid.svg') }} "  class="eyes" width="100%" height="100%" />
                                    </div>
                                    <div class="server-error text-danger textD" id="server_error"> @error('password') {{ $message }} @enderror </div>
                                </div>
                            </div>

                            <div><input type="hidden" name="crud_req" value="login"></div>

                            <div class="submit-btn text-center my-5">
                                <button type="submit" name="submitBTN" id="submitBTN" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- #register area -->

    </main>

    <script src=" {{ asset('js/myjquery.js') }} "></script>
    <script src=" {{ asset('js/main.js') }} "></script>
    <script src=" {{ asset('js/login.js ') }}"></script>
    
</body>
</html>
