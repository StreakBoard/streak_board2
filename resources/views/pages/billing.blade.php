
@include('pages.header')
  <?php
              $pacakge_update_date = DB::table('transactionlogs')
            ->select('updated_at')
            ->where(['cardinfo' => \Auth::user()->id ])
            ->get();
                foreach ($pacakge_update_date as $pacakge_update_date) {
                      $pacakge_update_date = $pacakge_update_date->updated_at;
                }
                $newDate = date("y-m-d", strtotime($pacakge_update_date));

                $dt = strtotime($newDate);
                 $dt = date("Y-m-d", strtotime("+1 month", $dt));

                $month = date("m",strtotime($dt));
                $day = date("d",strtotime($dt));
                $month_name = date("F", mktime(0, 0, 0, $month, 10));

            // dd($month_name);
          ?>

	<div class="content-holder">
	<div class="content-div">
		<div class="heading-content-div flex">
			<div class="left-section">
				<div class="top-header-area">
					<h1 class="h1">Billing</h1>
				</div>
				<div class="home-subhead dark inner">Your plan will renew on {{$month_name}} {{$day}}</div>
			</div>
			<div class="right-upgrade"><a href="{{url('/upgradeaccount')}}" class="upgrade-btn w-button">Upgrade Plan</a></div>
		</div>
		<div class="flex-area">
			<div class="billing-div">
				<div class="table-headers-div">
					<div class="header-text w-clearfix">
						<div class="billing-table-header">SUBSCRIPTION</div>
						<div class="billing-table-header billperiod">BILLING PERIOD</div>
						<div class="billing-table-header card-info">CARD INFO</div>
					</div>
				</div>
			    	@foreach($transactionlog  as $transactionlogs)

									<div class="first-row-div  w-clearfix">
						<div class="email-div subscription">
							<div class="email-table">{{$transactionlogs->Subscription}}</div>
						</div>
						<div class="email-div billperiod">
							<div>{{$transactionlogs->billingperiod}}</div>
						</div>
						<div class="email-div card-info">
							<?php
							$User = App\User::where('id',\Auth::user()->id)->first();
                            $UserName=$User->name;
							?>
							<div>{{$UserName}}</div>
						</div>
					</div>
					@endforeach()

			</div>
			<div class="billing-lower-div"><a href="{{url('/upgradeaccount')}}" class="downgrade-cancel-styling">Downgrade Plan</a><a href="#" class="downgrade-cancel-styling">Cancel Plan</a></div>
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
