@include('pages.header')
        </div>
    </div>
	 <div class="content-holder">
	<div class="content-div">
		<div class="heading-content-div flex">
			<div class="left-section">
				<div class="top-header-area">
					<h1 class="h1">Pricing Plans</h1>
				</div>
				<div class="home-subhead dark inner">You are currently on the Starter plan</div>
			</div>
		</div>
				<div class="flex-area">
			<div class="pricing-holder _2">

									<div class="pricing-box-2">
						<div class="plan-name">Starter</div>
						<div class="plan-price-2">Free<span class="month-text"></span></div>
						<div class="plan-checkbox"><img src="assets/images/greentick.png" width="14" alt="">
							<div class="plan-text"><strong>2</strong> members per team</div>
						</div>
						<div class="plan-checkbox"><img src="assets/images/greentick.png" width="14" alt="">
							<div class="plan-text">Create <strong>1</strong> team</div>
						</div>
													<a href="#" class="cta-3 pricing w-button">Current plan</a>
											</div>
									<div class="pricing-box-2">
						<div class="plan-name">Standard</div>
						<div class="plan-price-2">$24<span class="month-text">/m</span><span class="month-text"></span></div>
						<div class="plan-checkbox"><img src="assets/images/greentick.png" width="14" alt="">
							<div class="plan-text"><strong>20</strong> members per team</div>
						</div>
						<div class="plan-checkbox"><img src="assets/images/greentick.png" width="14" alt="">
							<div class="plan-text">Create <strong>5</strong> teams</div>
						</div>
													<a href="{{route('register')}}" class="cta-3 pricing w-button">Select plan</a>
											</div>
									<div class="pricing-box-2">
						<div class="plan-name">Unlimited</div>
						<div class="plan-price-2">$70<span class="month-text">/m</span><span class="month-text"></span></div>
						<div class="plan-checkbox"><img src="assets/images/greentick.png" width="14" alt="">
							<div class="plan-text"><strong>Unlimited</strong> members per team</div>
						</div>
						<div class="plan-checkbox"><img src="assets/images/greentick.png" width="14" alt="">
							<div class="plan-text">Create <strong>unlimited</strong> teams</div>
						</div>
													<a href="{{route('register')}}" class="cta-3 pricing w-button">Select plan</a>
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
