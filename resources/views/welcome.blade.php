@if (Auth::check())
@include('pages.header')
@else
@include('layouts-main.header')
@endif


	 <div id="herohead" data-w-id="58171c9b-cf98-1a93-dd9e-ddd759230b83" class="hero-home">
    <div class="coming-soon-pill" data-ix="fade-on-load-3">
      <div class="coming-soon---inner">
        <div class="new-block">Lauching next</div>
        <div class="frame-name">Slack integration</div>
      </div>
    </div>
    <div class="hero-div">
      <div class="left-content">
        <h1 class="h1-home" data-ix="fade-on-load-1">Better productivity for remote teams</h1>
        <div class="home-subhead dark" data-ix="fade-on-load-1">Submit tasks and build your streak. Organise your day and increase get more done with collaborative productivity.</div><a href="{{ route('register') }}" class="cta-signup home w-button">Get started for free</a></div>
      <div class="right-content w-clearfix"><img src="{{ URL::asset('assets/images/optimise-min.png') }}" srcset="{{ URL::asset('assets/images/optimise-min-p-500.png 500w') }}, {{ URL::asset('assets/images/optimise-min-p-800.png') }} 800w, {{ URL::asset('assets/images/optimise-min-p-1080.png') }} 1080w, {{ URL::asset('assets/images/optimise-min.png') }} 1801w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 92vw, (max-width: 991px) 98vw, (max-width: 3831px) 47vw, 1801px" alt="" class="right-img-hero" data-ix="fade-on-load-1"></div>
    </div>
    <div class="circle-shape"></div>
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
        <div class="split-content w-clearfix"><img src="{{ URL::asset('assets/images/ui-3.jpg') }}" srcset="{{ URL::asset('assets/images/ui-3-p-500.jpeg') }} 500w, {{ URL::asset('assets/images/ui-3-p-800.jpeg') }} 800w, {{ URL::asset('assets/images/ui-3-p-1080.jpeg') }} 1080w, {{ URL::asset('assets/images/ui-3-p-1600.jpeg') }} 1600w, {{ URL::asset('assets/images/ui-3.jpg 1689w') }}" sizes="(max-width: 991px) 90vw, (max-width: 3838px) 44vw, 1689px" alt="" class="left" data-ix="fade-on-scroll-1"></div>
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
  <div class="cta-section" data-ix="fade-on-scroll-1">
    <div class="cta-div centred">
      <div class="upper-head colour" data-ix="fade-on-scroll-2">FEATURES</div>
      <div class="section-title white" data-ix="fade-on-scroll-2">Why we think you&#x27;ll love us</div>
      <div class="features-blocks">
        <div class="holding-features">
          <div class="feature-div" data-ix="fade-on-scroll-1"><img src="{{ URL::asset('assets/images/icons8-account-filled-100_1icons8-account-filled-100.png') }}" height="24" alt="" class="tick-img">
            <div class="feature-text">Increase productivity</div>
            <div class="section-subhead leftaligned white">We help to gamify work. Submit tasks and build your streak. Compete against your team to be more productive.</div>
          </div>
          <div class="feature-div" data-ix="fade-on-scroll-2"><img src="{{ URL::asset('assets/images/icons8-checklist-filled-100_1icons8-checklist-filled-100.png') }}" height="24" alt="" class="tick-img">
            <div class="feature-text">Follow your team&#x27;s progress</div>
            <div class="section-subhead leftaligned white">See what your team has been working on with our &#x27;task history&#x27; display. Use their productivity to increase your own.</div>
          </div>
          <div class="feature-div" data-ix="fade-on-scroll-3"><img src="{{ URL::asset('assets/images/icons8-feather-filled-100_1icons8-feather-filled-100.png') }}" height="24" alt="" class="tick-img">
            <div class="feature-text">Lightweight and easy to use</div>
            <div class="section-subhead leftaligned white">Streak has been built to be super simple to use (and we&#x27;re always improving!). We removed any unnecessary &#x27;fluff&#x27;.</div>
          </div>
          <div class="feature-div" data-ix="fade-on-scroll-1"><img src="{{ URL::asset('assets/images/icons8-time-filled-100_1icons8-time-filled-100.png') }}" width="24" alt="" class="tick-img">
            <div class="feature-text">Minimal time commitment</div>
            <div class="section-subhead leftaligned white">We realize that your time is important. We&#x27;ve built Streak to be a speedy process in order to prevent time wasting.</div>
          </div>
          <div class="feature-div" data-ix="fade-on-scroll-2"><img src="{{ URL::asset('assets/images/icons8-slack-new-90-2_1icons8-slack-new-90-2.png') }}" width="24" alt="" class="tick-img">
            <div class="feature-text">Slack integration <span class="coming-soon-span">(coming soon)</span></div>
            <div class="section-subhead leftaligned white">We&#x27;re releasing a Slack integration soon. You&#x27;ll be able to add tasks, mark as completed, see your streaks and what your team has been working on, all from Slack.</div>
          </div>
          <div class="feature-div" data-ix="fade-on-scroll-3"><img src="{{ URL::asset('assets/images/icons8-add-new-filled-100_1icons8-add-new-filled-100.png') }}" width="24" alt="" class="tick-img">
            <div class="feature-text">More integrations <span class="coming-soon-span">(coming soon)</span></div>
            <div class="section-subhead leftaligned white">We have more integrations coming soon. We&#x27;re planning on integrating with popular task management systems to automatically pull your daily tasks.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="join-cta">
    <div class="cta-div centred">
      <div class="section-title white" data-ix="fade-on-scroll-1">Join Streak today</div>
      <div class="section-subhead light" data-ix="fade-on-scroll-2">It&#x27;s free to get started - try it out today</div>
	  <a href="{{ route('register') }}" class="light-cta w-button" data-ix="fade-on-scroll-3">Get started for free</a></div>
  </div>
  <div class="pricing-section">
    <div class="functionality-content">
      <div class="upper-head" data-ix="fade-on-scroll-1">SIMPLe &amp; Transparent</div>
      <div class="section-title" data-ix="fade-on-scroll-1">Pricing</div>
      <div class="section-subhead" data-ix="fade-on-scroll-2">Payments are handled securely by Stripe. Cancel anytime.</div>
      <div class="pricing-holder _2 home">
        			<div class="pricing-box-2">
				<div class="plan-name">Starter</div>
				<div class="plan-price-2">Free<span class="month-text"></span></div>
				<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
					<div class="plan-text"><strong>2</strong> members per team</div>
				</div>
				<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
					<div class="plan-text">Create <strong>1</strong> team</div>
				</div>
				<a href="{{ route('register') }}" class="cta-3 pricing w-button">Select plan</a>
			</div>
					<div class="pricing-box-2">
				<div class="plan-name">Standard</div>
				<div class="plan-price-2">$24<span class="month-text">/m</span><span class="month-text"></span></div>
				<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
					<div class="plan-text"><strong>20</strong> members per team</div>
				</div>
				<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
					<div class="plan-text">Create <strong>5</strong> team</div>
				</div>
				<a href="{{ route('register') }}" class="cta-3 pricing w-button">Select plan</a>
			</div>
					<div class="pricing-box-2">
				<div class="plan-name">Unlimited</div>
				<div class="plan-price-2">$70<span class="month-text">/m</span><span class="month-text"></span></div>
				<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
					<div class="plan-text"><strong>Unlimited</strong> members per team</div>
				</div>
				<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
					<div class="plan-text">Create <strong>unlimited</strong> team</div>
				</div>
				<a href="{{ route('register') }}" class="cta-3 pricing w-button">Select plan</a>
			</div>
		      </div>
    </div>
  </div>

<!-- remove member confirm popup -->
<div class="overLay"></div>
<div class="confirmPopup">
	<p>Remove this member from your team?</p>
	<p><button class="invite-button view w-button yesdelete">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="invite-button view w-button" onClick="jQuery(this).parent().parent().hide();jQuery('.overLay').hide();">No</button></p>
</div>
<!-- remove member confirm popup -->


@include('layouts-main.footer')
