<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Streak: increase productivity by gamifying tasks</title>
    <meta content="Homepage" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
    <link href="{{ URL::asset('assets/css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/streakapp.webflow.css') }}" rel="stylesheet" type="text/css">
      <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css">

      <script src="{{ URL::asset('assets/js/webfont.js') }}" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">
    WebFont.load({
    google: {
    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic"]
    }
    });
    </script>
    <link href="{{ URL::asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/streakapp-frontend.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/images/streak-favicon_1streak-favicon.png') }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ URL::asset('assets/images/streak-web.png') }}" rel="apple-touch-icon">
    <style>
    @media screen and (max-width: 1200px) {
    .content-div {
    margin-left: 6%;
    margin-right: 6%;
    }
    }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143705084-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-143705084-1');
    </script>
  </head>
  <div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
  </div>
  <body class="body">
    <input type="hidden" id="site_url" value=""/>
    <div data-collapse="small" data-animation="default" data-duration="400" class="nav-backing noline inner w-nav">
      <a href="https://streakboard.io" class="brand-box w-nav-brand w--current">
        <img src="{{ URL::asset('assets/images/logo.jpg') }}" width="120" data-w-id="d30cf77a-33a9-cd76-a970-6b9f052c49b1" alt="">
        <div class="beta-box"><div>BETA</div></div>
      </a>
      <a href="{{url('/Howitwork')}}" class="nav-dark landscape-hide w-nav-link">How it works</a>
      <a href="{{url('/FAQ')}}" class="nav-dark landscape-hide w-nav-link">FAQ</a>
      <a href="{{url('/Contact')}}" class="nav-dark landscape-hide w-nav-link">Contact</a>
      <div class="menu-button w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
      <nav role="navigation" class="nav-link-menu logged-out w-clearfix w-nav-menu">
        <div data-delay="0" class="light-dropdown-style dark w-dropdown">
          <div class="dropdown-styling no-margin w-dropdown-toggle">
            <div class="arrow-icon w-icon-dropdown-toggle"></div>
            <div>Change team</div>
          </div>
          <nav class="dropdown-list teams w-dropdown-list forpadding">
            <a href="user/dashboard/MzQ3" class="nav-dark wide w-dropdown-link active">{{  Auth::user()->team_name }}</a>
          </nav>
        </div>
        <a href="{{ route('dashboard') }}" class="nav-dark right responsive w-nav-link">Dashboard</a>
        <a href="{{url('/member')}}" class="nav-dark right responsive w-nav-link">Members</a>
        <a href="{{url('/take-history')}}" class="nav-dark right responsive w-nav-link">Task history</a>
        <a href="{{ route('account-setting') }}" class="nav-dark right responsive w-nav-link">Account settings</a>
        <?php


        $matchThese = ['user_id' => \Auth::user()->id];
        $team_id = App\Team::where($matchThese)->count();

        ?>
        @if($team_id!= 0)
        <a href="{{url('/create-team')}}" target="_blank" class="nav-dark right w-nav-link">+ Create team</a>
        @endif
        <!--************************************************************************************************************************** -->
        <div class="secondary-dropdown-links desktop-none">
          <a href="{{url('/billing')}}" class="nav-dark right responsive w-nav-link">Billing</a>
          <a href="{{url('/upgradeaccount')}}" class="nav-dark right _2 w-nav-link">Upgrade Account</a>
          <!-- <a href="{{ route('logout') }}" class="nav-dark right responsive w-nav-link">Logout</a> -->
        </div>
        <div class="secondary-dropdown-links desktop-none">
          <a href="{{url('/Howitwork')}}" class="nav-dark right responsive w-nav-link">How it works</a>
          <a href="{{url('/FAQ')}}" class="nav-dark right responsive w-nav-link">FAQ</a>
          <a href="{{url('/Contact')}}" class="nav-dark right responsive w-nav-link">Contact</a>
        </div>
        <div class="user-dropdown-holder">
          <div data-delay="0" class="user-dropdown w-dropdown">
            <div class="dropdown-toggle w-dropdown-toggle">
              <div class="email-style"> {{ Auth::user()->name }}</div>
              <div class="icon-style w-icon-dropdown-toggle"></div>
            </div>
            <nav class="dropdown-list w-dropdown-list">
              <a href="{{ route('team_dashboard') }}" class="nav-dark wide hidden w-nav-link w--current">Dashboard</a>
              <a href="{{url('/member')}}" class="nav-dark wide w-nav-link">Members</a>
              <a href="{{url('/take-history')}}" class="nav-dark wide w-nav-link">TASK HISTORY</a>
              <a href="{{ route('account-setting') }}" class="nav-dark wide w-nav-link">Account settings</a>
              <a href="{{url('/create-team')}}" class="nav-dark wide w-nav-link">+ Create Team</a>
              <div class="secondary-dropdown-links">
                <a href="{{url('/pricing-plan')}}" class="nav-dark wide secondary w-nav-link">UPGRADE ACCOUNT</a>
                <a href="{{url('/billing')}}" class="nav-dark wide secondary w-nav-link">Billing</a>
                <!-- Logit form and anchor start -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-dark wide secondary w-nav-link">{{ __('Logout') }}</a>
                <!-- Logit form and anchor end -->
              </div>
            </nav>
          </div>
        </div>
      </nav>
    </div>
    <div class="subnav-section">
      <div class="subnav-content">
        <div class="subnav-links-div">
          <a href="{{ route('team_dashboard') }}" class="nav-light w--current">Dashboard</a>
          <a href="{{url('/member')}}" class="nav-light">Members</a>
          <a href="{{url('/take-history')}}" class="nav-light">Task history</a>
          <a href="{{ route('account-setting') }}" class="nav-light">Account settings</a>
          <a href="{{url('/billing')}}" class="nav-light">Billing</a>
        </div>
        <div class="team-dropdown-div w-clearfix">
          <div data-delay="0" class="light-dropdown-style w-dropdown">
            <div class="dropdown-styling w-dropdown-toggle">
              <div class="arrow-icon w-icon-dropdown-toggle"></div>
              <div>Change team</div>
            </div>
            <nav class="dropdown-list teams w-dropdown-list forpadding">
              <!-- <a href="" class="nav-dark wide w-dropdown-link active">{{  Auth::user()->team_name }}</a> -->
              <?php foreach ($teams as $teams): ?>
              <a href="{{ url('get_id', $teams->team_id) }}" class="nav-dark wide w-dropdown-link active" tabindex="-1" role="menuitem" style="outline: none;">{{ $teams->team_name }}</a>
              <?php endforeach; ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
