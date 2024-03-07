<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>HRIS | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Livewires -->
    @livewireStyles

    <!-- App js -->
    <script src="{{ asset('assets/js/plugin.js') }}"></script>

</head>

<body style="background-color: #f5f5f5" class="auth-body-bg">
    <form action="{{route('login_new')}}">
        <div style="position:absolute; width:100%; top:0; height:50px; background-color:#65B7D0">
            <div style="display: flex; width: 100%; justify-content: end; gap:10px; align-items: center; height: 100%;">
                <div style="display: flex; flex-direction: row;">
                    <input placeholder="Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                </div>

                <div style="display: flex; flex-direction: row;">
                    <input placeholder="Password" type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <button style="margin-right:10px;" class="btn btn-primary waves-effect waves-light" id="login_button" type="submit">Log In</button>

            </div>
        </div>
    </form>
    <div class="card-body" style="background-color:white ; position:absolute; box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75); -webkit-box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75); border-radius: 15px; height: fit-content; width: 600px; top:50%; left:50%; transform:translate(-50%,-50%);">
        <form style="padding: 1px; margin:0;">
            <div class="mb-3">
                <div class="card-title" style="border-bottom: 0.5px #CBCBCB solid; width:100%; margin:0;">
                    <h2 class="ms-2 mt-2">RETRIEVE YOUR PASSWORD</h2>
                </div>
            </div>
            <div style="padding: 0px 10px 10px 10px;">
                <p>Please enter your email to search for your account.</p>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" id="">
                    <div id="" class="form-text">We'll never share your password with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color:#65B7D0">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- owl.carousel js -->
    <script src="{{ asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>

    <!-- auth-2-carousel init -->
    <script src="{{ asset('assets/js/pages/auth-2-carousel.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Livewire -->
    @livewireScripts

</body>

</html>