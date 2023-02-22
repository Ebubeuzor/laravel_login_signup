<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
    @if (Session::get('Success'))
        <div class="alert alert-success">
            {{ Session::get('Success') }}
        </div>
    @endif
    
    @if (Session::get('Fail'))
        <div class="alert alert-danger">
            {{ Session::get('Fail') }}
        </div>
    @endif

    <main id="main-area">

    <!-- register area -->
    <section id="register">
        <div id="row" class="row m-0">
            <div class="register-con">
                <div class="text-center pd-5">
                    <h1 class="login-title text-dark" >Registeration</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
                    <span class="p-1 m-0 font-ubuntu text-black-50">I already have <a href="{{ route('auth.login') }}">Login</a> </span>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pd-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('images/camera-solid.svg') }}" alt="camera" class="camera-icon" />
                        </div>
                        <img src="{{ asset('images/luser.png') }}" alt="profile" class="img rounded-circle" />
                        <small class="form-text text-black-50">Choose image</small>
                        <input form="reg-form" type="file" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>
                <div class="d-flex justify-context-center">
                    <form id="reg-form" action="{{route('auth.save')}}" enctype="multipart/form-data"  method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                                <span class="text-danger textD">@error('firstName'){{ $message }}  @enderror</span>
                            </div>

                            <div class="col">
                                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                                <span class="text-danger textD">@error('lastName'){{ $message }}  @enderror</span>
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <span class="text-danger textD">@error('email'){{ $message }}  @enderror</span>
                        </div>

                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <span class="text-danger textD" id="Confirm_error">@error('password'){{ $message }}  @enderror</span>
                                
                                <div class="img-con eyebtn">
                                    <img src="{{ asset('images/eye-solid.svg') }}"  class="eyes" width="100%" height="100%" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row my-4">
                            <div class="col abs">
                                <input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password">
                                <span class="text-danger textD">@error('confirm_pwd'){{ $message }}  @enderror</span>
                                
                                <div class="img-con eyebtn2">
                                    <img src="{{ asset('images/eye-solid.svg') }}" class="eyes2" width="100%" height="100%" />
                                </div>
                                <div class="server-error" id="server_error"></div>
                            </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" class="form-check-input" required />
                            <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">terms, conditions and policy</a> (*)</label>
                        </div>

                        <div><input type="hidden" name="crud_req" value="signup"></div>
                        
                        <div class="submit-btn text-center my-5">
                            <button type="submit" id="submitBTN" name="submitBTN" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #register area -->

    </main>


<!-- JavaScript Bundle with Popper -->
<script src="{{ asset('js/myjquery.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>