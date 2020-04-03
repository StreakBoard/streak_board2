@include('pages.header')
  <div class="contact-section">
    <div class="form-holding-div">
      <div class="pricing-holder _2">
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
					<div class="plan-text">Create <strong>5</strong> teams</div>
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
					<div class="plan-text">Create <strong>unlimited</strong> teams</div>
				</div>
				<a href="{{ route('register') }}" class="cta-3 pricing w-button">Select plan</a>
			</div>
		      </div>
      <div class="faq-row pricing w-row">
        <div class="column _1 w-col w-col-4 w-col-stack">
          <div class="hiw-div">
            <div class="heading-3 no-top-padding">When do I get billed?</div>
            <p class="paragraph">Your first billing will occur after you enter your payment details (this is only required once you upgrade your plan). You&#x27;ll then be billed on the same day of every month.</p>
          </div>
        </div>
        <div class="col-2 w-col w-col-4 w-col-stack">
          <div class="hiw-div">
            <div class="heading-3 no-top-padding">Can I cancel any time?</div>
            <p class="paragraph">Yes! Visit your &#x27;Billing&#x27; page and click &#x27;Cancel&#x27; or &#x27;Downgrade&#x27; to cancel/change your billing plan.</p>
          </div>
        </div>
        <div class="col-3 w-col w-col-4 w-col-stack">
          <div class="hiw-div">
            <div class="heading-3 no-top-padding">What&#x27;s your refund policy?</div>
            <p class="paragraph">If you&#x27;re unhappy with Streak, we&#x27;ll refund your month&#x27;s usage, no questions asked.</p>
          </div>
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

@include('pages.footer')
