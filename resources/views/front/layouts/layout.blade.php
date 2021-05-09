
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- //for-mobile-apps -->
    <link href="{{asset('assets/front/css/front.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <style>
        .is-invalid{
            border: 1px solid red;
        }
    </style>
</head>

<body>
<!-- header -->
<div class="header">
    <div class="search" style="width: 30%; margin-top: 1em;">
        <form method="get" action="{{ route('search') }}" class="form-inline ">
            <input style="width: 250px; height: 40px;" class="form-control mr-sm-2 @error('s') is-invalid @enderror" type="search" placeholder="Qidiruv..." aria-label="Search" name="s">
                <button class="btn btn-outline-success my-2 my-sm-0" style="height: 40px;" type="submit"><span class='glyphicon glyphicon-search'></span></button>
        </form>
    </div>
    <div class="logo" style=" margin-left: 4em;">
        <a href=""><img src="{{asset('assets/front/images/logo.png')}}" alt="" style="width: 250px; height:80px; "></a>
    </div>
    <div class="logo-right">
        <ul>
            <li>@if(auth()->user()) {{auth()->user()->name}}| <a href="{{route('logout')}}">Chiqish</a>@endif</li>|
            <li>Телефон</li>:
            <li>+998 93 968 00 79</li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="header-nav" style="background: #007bff">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-1">
                    <ul class="nav navbar-nav" style="font-size: 20px; color: #fff">
                        <li class="active"><a href="{{route('home')}}">Bosh Sahifa</a></li>
                        <li><a href="{{route('cat')}}">Kategoriyalar</a></li>
                        <li><a href="{{route('admin.index')}}">Admin Panelga o`tish</a></li>
                        <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>@if(session('cartSum')) {{session('cartSum')}} @else 0  @endif so`m</a></li>
                    </ul>
                </nav>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
@yield('content')
<div class="footer">
    <div class="container">
        <div class="footer-row">
            <div class="col-md-3 footer-grids">
                <h4><a href="#">Seafaring</a></h4>
                <p><a href="#">mail@example.com</a></p>
                <p>+2 000 222 1111</p>
                <ul class="social-icons">
                    <li><a href="#" class="p"></a></li>
                    <li><a href="#" class="in"></a></li>
                    <li><a href="#" class="v"></a></li>
                    <li><a href="#" class="facebook"></a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grids">
                <h3>Navigation</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-2 footer-grids">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Photo Gallery</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Lemollisollis</a></li>
                </ul>
            </div>
            <div class="col-md-4 footer-grids">
                <h3>Newsletter</h3>
                <p>It was popularised in the 1960s with the release Ipsum. <p>
                <form>
                    <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
                    <input type="submit" value="Go">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <p>Copyright © 2021 Aslonov Akobir</p>
    </div>
</div>
<!--//footer-->
<!-- for bootstrap working -->
<script src="{{asset('assets/front/js/front.js')}}"> </script>
<!-- //for bootstrap working -->
</body>
</html>
