<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
</head>
<body>
    

    <main id="main-area">
        
        <!-- register area -->
        <section id="main-site">
            <div class="container py-5">
                <div class="row">
                    <div class="col-4 offset-4 shadow py-4">
                        <div class="upload-profile-image d-flex justify-content-center pb-5">
                            <div class="text-center">
                                <img src="{{ asset($LoggedUserInfo['profilePic']) }}" alt="profile" class="img rounded-circle" />
                                <h4>
                                    {{ $LoggedUserInfo['firstName'] . " " . $LoggedUserInfo['lastName'] }}
                                </h4>
                            </div>
                        </div>
                        <div class="user-info px-3">
                            <ul class="font-ubuntu navbar-nav">
                                <li class="nav-link"><b>First Name: </b><span>{{ $LoggedUserInfo['firstName'] }}</span></li>
                                <li class="nav-link"><b>Last Name: </b><span>{{ $LoggedUserInfo['lastName'] }}</span></li>
                                <li class="nav-link"><b>Email: </b><span>{{ $LoggedUserInfo['email'] }}</span></li>
                            </ul>
                        </div>

                        <div class="log_out" style=" margin:10px auto; width: fit-content; height: fit-content;">
                            <a href=" {{ route('auth.logout') }} " style="padding: 10px; color: white; background-color: orange; text-align: center;">Logout</a>
                        </div>

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

