@include('pages.header')

<div class="content-holder">
	<div class="content-div">
	    @if(session()->has('message'))
     <div class="success-msg w-form-done"><div>{{ session()->get('message') }}</div></div>
@endif
		<div class="heading-content-div flex">
			<div class="left-section">
				<div class="top-header-area">
					<h1 class="h1">Pricing Plans</h1>
				</div>
					<?php
				$packagesData = App\transactionlog::where('cardinfo',\Auth::user()->id)->first();
				$Subscription = $packagesData->Subscription;
				?>
				<div class="home-subhead dark inner">You are currently on the {{$Subscription}} plan</div>
			</div>

			</div>
				<div class="flex-area">
			<div class="pricing-holder _2">
				@foreach($packages as $packages)
									<div class="pricing-box-2">
									    <?php
									    $prices=$packages->price;
									    if($prices==0)
									    {
									        $prices="Free";
									    }
									    else
									    {
									        $dollar="$";
									        $permonth="/m";
									        $prices=$dollar . $packages->price . $permonth;
									    }

									    ?>
<style>
    a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
						<div class="plan-name">{{$packages->title}}</div>
						<div class="plan-price-2">{{$prices}}<span class="month-text"></span></div>
						<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
							<div class="plan-text"><strong>{{$packages->desc1}}</strong> members per team</div>
						</div>
						<div class="plan-checkbox"><img src="{{ URL::asset('assets/images/greentick.png') }}" width="14" alt="">
							<div class="plan-text">Create <strong>{{$packages->desc2}}</strong> team</div>
						</div>
						<?php
				        	$prices=$packages->price;
									    if($prices==0)
									    {
									        $link="/freePackage";
									    }
									    else{
									        $ids=$packages->id;
									        $link="/paymentprocess/$ids";
									    }
						?>
						@if($packages->title==$Subscription)
						<a href="{{$link}}" class="cta-3 pricing w-button disabled">Current plan</a>
						@else
						<a href="{{$link}}" class="cta-3 pricing w-button">Select plan</a>
						@endif
											</div>
											@endforeach()
							</div>
		</div>
	</div>
</div>
@include('pages.footer')
