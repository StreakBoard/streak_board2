<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Streak: increase productivity by gamifying tasks</title>
    <meta content="Homepage" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="{{ URL::asset('assets/css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/streakapp.webflow.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ URL::asset('assets/js/webfont.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        WebFont.load({
            google: {
                families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic"]
            }
        });
    </script>

    <link href="{{ URL::asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/streakapp-frontend.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/streakapp-socialize.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('assets/images/streak-favicon_1streak-favicon.png') }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ URL::asset('assets/images/streak-web.png') }}" rel="apple-touch-icon">

    <!-- [if lt IE 9]><script src="assets/js/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>
    <!--
    <link href="assets/images/zimmy-ico_1zimmy-ico.jpg" rel="shortcut icon" type="image/x-icon">
    <link href="assets/images/webclip.jpg" rel="apple-touch-icon">
   -->
    <style>
        @media screen and (max-width: 1200px) {
            .content-div {
                margin-left: 6%;
                margin-right: 6%;
            }
        }
    </style>
</head>
<body class="body">
    <input type="hidden" id="site_url" value="index.html"/>
    <div data-collapse="small" data-animation="default" data-duration="400" class="nav-backing noline inner w-nav">
        <a href="https://streakboard.io/" class="brand-box w-nav-brand w--current">
            <img src="{{ URL::asset('assets/images/logo.jpg') }}" width="120" data-w-id="d30cf77a-33a9-cd76-a970-6b9f052c49b1" alt="">
            <div class="beta-box"><div>BETA</div></div>
        </a>
        <a href="{{url('/howitwork')}}" class="nav-dark landscape-hide w-nav-link">How it works</a>
        <a href="{{url('/faq')}}" class="nav-dark landscape-hide w-nav-link">FAQ</a>

        <a href="{{url('/pricing')}}" class="nav-dark landscape-hide w-nav-link">Pricing</a>

        <a href="{{url('/contact')}}" class="nav-dark landscape-hide w-nav-link">Contact</a>
        <a href="{{url('/login')}}" class="nav-dark right lower mobile-only w-nav-link">Login</a>
    <div class="menu-button w-nav-button">
            <div class="w-icon-nav-menu"></div>
        </div>
        <nav role="navigation" class="nav-link-menu logged-out w-clearfix w-nav-menu">
                <a href="{{ route('login') }}" class="nav-dark right lower w-nav-link">Login</a>
                <a data-ix="show-modal"  href="{{ route('register') }}" class="add-link-button nav w-button">SIGN UP</a>
                    </nav>
    </div>
