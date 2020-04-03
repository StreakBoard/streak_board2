@include('pages.header')

	<div class="content-holder">
	<div class="content-div">
				<div class="heading-content-div flex">
			<div class="left-section">
				<div class="top-header-area split">

@foreach($users as $team_name)
@if ($loop->first)
        	<h1 class="h1 members-text">{{ $team_name->team_name  }}'s Members (<span class="number-span" id="tMember">{{ $loop->count }}</span>)</h1>
    @endif
@endforeach
													<a href="{{url('/invite')}}" class="invite-button w-button">+ Invite member</a>


				</div>
				<div class="home-subhead dark inner">Add members to your team </div>
			</div>
			<div class="right-section"></div>
		</div>
		<div class="flex-area">
			<div class="grid-box-4 members">
				<div class="member-grid">

				@foreach($users as $member_name)
				<div class="member-holder">
					<div class="profile-img smaller">
														<div>O</div>
												</div>
					<div class="right-streak-content">
						<div class="username-text wider">{{ $member_name->name}}</div>
						<div class="streak-info vertical">
										<div class="streak-holding-div level1">
			<img src="assets/images/level1.png" width="15" alt="" class="streak-icon">
			<?php

			$UserId = $member_name->Uid;
			$teamId = $member_name->id;
			$matchThese = ['user_id' => $UserId, 'task_status' => 1, 'team_id' => $teamId];
			$task_count = App\Task::where($matchThese)->count();
			$streaks = App\Streak::where('team_id',$teamId)->first();
												if($streaks)
												{
												    $StreakCount = $streaks->streaks_no;

												}
												else{
												    $StreakCount = "0";
												}
															// $StreakNumber=$streak_count->streaks_no;
			 ?>
			<div class="streak-figure">{{$StreakCount}}</div>
		</div>
					<div class="streak-holding-div completed"><img src="assets/images/icons8-ok-48.png" width="15" alt="" class="streak-icon">
		<div class="streak-figure">{{$task_count}}</div>
	</div>
						</div>
					</div>
				</div>
				@endforeach
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
