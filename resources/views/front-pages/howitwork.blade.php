@if (Auth::check())
@include('pages.header')
@else
@include('layouts-main.header')
@endif



	<div id="herohead" data-w-id="58171c9b-cf98-1a93-dd9e-ddd759230b83" class="hero-home">
    <div class="coming-soon-pill" data-ix="fade-on-load-3"></div>
    <div class="hero-div">
      <div class="left-content inner">

        <h1 class="h1-home hiw" data-ix="fade-on-load-1">How it works</h1>
        <div class="home-subhead dark" data-ix="fade-on-load-1">We&#x27;ve built Streak 1.0 to be super simple - if you have any feedback, please <a href="{{url('/contact')}}" class="link-style">contact us</a></div><a href="{{ route('register') }}" class="cta-signup w-button">Get started for free</a></div>
      <div class="right-content"></div>
    </div>
    <div class="circle-shape inner"></div>
  </div>
  <div id="how-it-works" class="features-holder">
    <div class="feature-col-row w-row">
      <div class="w-col w-col-4 w-col-stack">
        <div class="full-feature-width" data-ix="fade-on-load-1">
          <div class="number">1</div>
          <div class="feature-heading">Create/join a team</div>
          <div class="feature-point">
            <div class="section-subhead leftaligned _3-step">Get started by creating or joining a team. It takes 2 minutes to create a team and even less to join one. No payment information required!</div>
          </div>
        </div>
      </div>
      <div class="feature-col-middle w-col w-col-4 w-col-stack">
        <div class="full-feature-width" data-ix="fade-on-load-2">
          <div class="number">2</div>
          <div class="feature-heading">Submit your tasks daily</div>
          <div class="feature-point">
            <div class="section-subhead leftaligned _3-step">Submit at least 1 task per day to build your streak. If you miss a day, your streak counter will reset to zero. Streaks do not break during weekends and you are able to set your status to &#x27;away&#x27; during vacations. </div>
          </div>
        </div>
      </div>
      <div class="w-col w-col-4 w-col-stack">
        <div class="full-feature-width" data-ix="fade-on-load-3">
          <div class="number">3</div>
          <div class="feature-heading">Build your streak, stay productive</div>
          <div class="feature-point">
            <div class="section-subhead leftaligned _3-step">Keep building your streak to stay at the top of the leaderboard. You&#x27;re able to see exactly what tasks your team have been submitting to help give you that extra motivational push.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="functionality-section">
    <div class="functionality-content">
      <div class="upper-head" data-ix="fade-on-scroll-1">WHAT IS STREAK</div>
      <div class="section-title" data-ix="fade-on-scroll-1">Streak keeps your team motivated, productive and accountable</div>
      <div class="section-subhead" data-ix="fade-on-scroll-2">Our platform is lightweight, easy to use and designed to help increase productivity</div>
      <div class="split-holder">
        <div class="split-content w-clearfix"><img src="{{ URL::asset('assets/images/ui-one.jpg') }}" srcset="{{ URL::asset('assets/images/ui-one-p-500.jpeg') }} 500w, {{ URL::asset('assets/images/ui-one-p-800.jpeg') }} 800w, {{ URL::asset('assets/images/ui-one-p-1080.jpeg') }} 1080w, {{ URL::asset('assets/images/ui-one.jpg') }} 1552w" sizes="(max-width: 991px) 90vw, (max-width: 3527px) 44vw, 1552px" alt="" class="left" data-ix="fade-on-scroll-1"></div>
        <div class="split-content text-right" data-ix="fade-on-scroll-2">
          <div class="upper-head left-aligned">Stay organised</div>
          <div class="section-title left-aligned">Add tasks &amp; view completed tasks</div>
          <div class="section-subhead leftaligned">Keep yourself organised by adding tasks to help plan your day. Mark tasks as &#x27;completed&#x27; for small wins and trigger a dopamine response. See all of your completed tasks on your dedicated &#x27;task history&#x27; page.</div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">Plan and organise your day</div>
          </div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">Complete tasks and build your streak</div>
          </div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">Small-wins for that sweet dopamine response!</div>
          </div>
        </div>
      </div>
      <div class="split-holder _2">
        <div class="split-content text-left" data-ix="fade-on-scroll-2">
          <div class="upper-head left-aligned">Gamifying work</div>
          <div class="section-title left-aligned">Build streaks, increase productivity</div>
          <div class="section-subhead leftaligned">Submit at least one task per day to build your streak. Be more productive with small-wins. See how your team is doing and climb the productivity leaderboard.</div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">Build your streak by submitting tasks</div>
          </div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">Climb the leaderboard</div>
          </div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">Turn work into a game</div>
          </div>
        </div>
        <div class="split-content w-clearfix"><img src="{{ URL::asset('assets/images/ui_3.jpg') }}" srcset="{{ URL::asset('assets/images/ui_3-p-800.jpeg') }} 800w, {{ URL::asset('assets/images/ui_3-p-1080.jpeg') }} 1080w, {{ URL::asset('assets/images/ui_3-p-1600.jpeg') }} 1600w, {{ URL::asset('assets/images/ui_3.jpg') }} 1812w" sizes="(max-width: 991px) 90vw, (max-width: 4118px) 44vw, 1812px" alt="" class="right img-home" data-ix="fade-on-scroll-1"></div>
      </div>
      <div class="split-holder last">
        <div class="split-content w-clearfix"><img src="{{ URL::asset('assets/images/ui-3.jpg') }}" srcset="{{ URL::asset('assets/images/ui-3-p-500.jpeg') }} 500w, {{ URL::asset('assets/images/ui-3-p-800.jpeg') }} 800w, {{ URL::asset('assets/images/ui-3-p-1080.jpeg') }} 1080w, {{ URL::asset('assets/images/ui-3-p-1600.jpeg') }} 1600w, {{ URL::asset('assets/images/ui-3.jpg') }} 1689w" sizes="(max-width: 991px) 90vw, (max-width: 3838px) 44vw, 1689px" alt="" class="left" data-ix="fade-on-scroll-1"></div>
        <div class="split-content text-right" data-ix="fade-on-scroll-2">
          <div class="upper-head left-aligned">Collaborative productivity</div>
          <div class="section-title left-aligned">Track your team&#x27;s activity</div>
          <div class="section-subhead leftaligned">Follow your team&#x27;s progress and use their productivity to increase your own. We display all tasks submitted in an easy-to-follow stream, updated in real-time.</div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">See what your team have been working on</div>
          </div>
          <div class="check-list"><img src="{{ URL::asset('assets/images/green-check_1green-check.jpg') }}" width="20" alt="">
            <div class="checklist-text">Use the productivity of others to increase your own</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="join-cta">
    <div class="cta-div centred">
      <div class="section-title white" data-ix="fade-on-scroll-1">Join Streak today</div>
      <div class="section-subhead light" data-ix="fade-on-scroll-2">It&#x27;s free to get started - try it out today</div><a href="{{route('register')}}" class="light-cta w-button" data-ix="fade-on-scroll-3">Get started for free</a></div>
  </div>
<!-- remove member confirm popup -->
<div class="overLay"></div>
<div class="confirmPopup">
	<p>Remove this member from your team?</p>
	<p><button class="invite-button view w-button yesdelete">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="invite-button view w-button" onClick="jQuery(this).parent().parent().hide();jQuery('.overLay').hide();">No</button></p>
</div>
<!-- remove member confirm popup -->

@include('layouts-main.footer')
