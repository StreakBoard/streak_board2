									@include('pages.header')
	<script type="text/javascript">
	jQuery(function(){
	jQuery('#alertMessage').delay(2000).fadeOut();
	});
	</script>
	<div class="content-holder">
		<div class="content-div">
			@if ($message = Session::get('success'))
			<div class="success-msg w-form-done"><div>{{ $message }}</div></div>
			@endif
			<?php
			$matchThese = ['id' => \Auth::user()->id];
					$check_if_user_verif_email_or_not = App\User::where($matchThese)->get();
			?>
			@foreach ($check_if_user_verif_email_or_not as $email_notify)
			@if(is_null($email_notify->email_verified_at))
			@if ($message = Session::get('notify'))
			<div class="success-msg w-form-done"><div>{{ $message }}</div></div>
			<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
				@csrf
				<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
			</form>
			@endif
			@endif
			@endforeach
			<div class="heading-content-div flex">
				<div class="left-section">
					<div class="top-header-area">
						@foreach ($users as $user)
						<?php
							$teamId = $user->id;
						?>
						@if($loop->first)
						<h1 class="h1">{{ $user->team_name }}</h1>
						@endif
						@endforeach()
						<?php
						$matchThese = ['id' => $teamId,'user_id' => \Auth::user()->id];
						$team_id = App\Team::where($matchThese)->count();
						?>
						@if($team_id != 0)
						<a href="{{url('/edit_team')}}"  class="subhead-link edit">Edit</a>
						@endif
						@if($team_id != 0)
						<a href="{{url('/invite')}}" class="invite-button w-button">+ Invite member</a>
						@endif

					</div>
				</div>
				<div class="task-div right">
					<div class="toggle-text-left">
						<h4 class="h4-head">Going away?</h4>
						<div class="light-subhead darker">Turn on this toggle so that you don&#x27;t lose your streak</div>
					</div>
					<style>
					.switch {
					position: relative;
					display: inline-block;
					width: 60px;
					height: 34px;
					}
					.switch input {
					opacity: 0;
					width: 0;
					height: 0;
					}
					.task-div.right {
    				padding: 21px 67px 10px 10px;
					}
					.slider {
					position: absolute;
					cursor: pointer;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					background-color: #ccc;
					-webkit-transition: .4s;
					transition: .4s;
					}
					.slider:before {
					position: absolute;
					content: "";
					height: 26px;
					width: 26px;
					left: 4px;
					bottom: 4px;
					background-color: white;
					-webkit-transition: .4s;
					transition: .4s;
					}
					input:checked + .slider {
					background-color: #3AD698;
					}
					input:focus + .slider {
					box-shadow: 0 0 1px #2196F3;
					}
					input:checked + .slider:before {
					-webkit-transform: translateX(26px);
					/* -ms-transform: translateX(26px);
					transform: translateX(26px); */
					}
					/* Rounded sliders */
					.slider.round {
					border-radius: 34px;
					}
					.slider.round:before {
					border-radius: 50%;
					}
					.switch-main{
/*					transform: translateX(26px);*/
					margin-right: 30px;
					}
					.switch-off{
					transform: translateX(26px);
					}

					.task-div.right{
						width: 100%!important;
						margin-left: 40%!important;
					}
					</style>
					<?php
					$matchThese = ['user_id' => \Auth::user()->id];
					$streaks = App\Streak::where($matchThese)->first();
					if($streaks){
							$streaksStatus = $streaks->status;
					}
					else{
								$streaksStatus = "Enabled";
								}
					?>
					@if($streaks)
					@if($streaksStatus == "Disabled")
					<div class = "switch-main">
						<label class="switch">
							<!-- <a href="/Enabledstreaks"> -->
							<input type='checkbox' name='chcktbl1' checked='checked'>
							<span class="slider round"></span>
						</a>
					</label>
				</div>
				@else
				<div class = "switch-off">
					<label class="switch">
						<!-- <a href="/streaks"> -->
						<input type='checkbox' name='chcktbl2' >
						<span class="slider round "></span>
					</a>
				</label>
			</div>
			@endif
			@endif
		</div>
	</div>
	<div class="flex-area">
		<div class="grid-box-1">
			<div class="block-head">
				<div class="heading-3 no-top-padding">Streak leaderboard 🔥</div>
			</div>
			<?php $i=1; ?>
			@foreach($users as $users)
			<div class="streak-block">
				<div class="position">    <?php  echo $i++; ?>
				</div>
				<div class="profile-img smaller">
					<div>O</div>
				</div>
				<div class="right-streak-content less-margin">
					<div class="username-text">  {{ $users->name }}
					</div>
					<?php
								$UserId = $users->Uid;
								$teamId = $users->id;
								$matchThese = ['user_id' => $UserId, 'task_status' => 1, 'team_id' => $teamId];
								$task_count = App\Task::where($matchThese)->count();
								$streaks = App\Streak::where('team_id',$teamId)->where('user_id',$UserId)->first();
								if($streaks)
								{
								$StreakCount = $streaks->streaks_no;
								}
								else{
								$StreakCount = "0";
								}
							?>

							<div class="streak-holding-div level1">
				<img src="assets/images/level1.png" width="15" alt="" class="streak-icon">
				<div class="streak-figure">							{{$StreakCount}}
</div>
			</div>


					<div class="streak-info">

						<div class="streak-holding-div completed"><img src="assets/images/icons8-ok-48.png" width="15" alt="" class="streak-icon">
							<div class="streak-figure">{{$task_count}}</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="grid-box-2">
			<div class="add-task-div aligned">
				<div class="task-div _70width">
					<h3 class="h3-head">Add task to your list</h3>
					<div class="light-subhead">Submit a task each day to add to your streak</div>
					<div class="w-form">
						<div class="flex-form">
							{{ csrf_field() }}
							<tr>
								<th><input type="text" class="white-form w-input" maxlength="200" name="New-Task" placeholder="e.g. Send email campaign" id="New-Task" required /></th>
								<th><input type="submit"  value="+ Add Task" data-wait="Adding..." class="add-task-button w-button"></th>
							</tr>
						</div>
						<div id="info" class="success-msg w-form-done" style="position: absolute;margin: 4px auto;padding: 6px 26px;font-size: 13px;display:none">
							<div>Task added!</div>
						</div>
					</div>
				</div>
				<div class="profile-card right-aligned">
					<div class="user-row">
						<div class="profile-img smaller">
							<div>O</div>
							</div><a href="{{ route('account-setting') }}" class="username-text link">{{ Auth::user()->name }}</a></div>
							<a href="#" class="right-streak-content no-margin w-inline-block">
								<div class="streak-info">
									<?php
										$matchThese = ['user_id' => \Auth::user()->id, 'task_status' => 1, 'team_id' => $teamId];
										$task_countAuth = App\Task::where($matchThese)->count();
										$streaks = App\Streak::where('team_id',$teamId)->where('user_id',\Auth::user()->id)->first();
										if($streaks)
										{
										$StreakCountAuth = $streaks->streaks_no;
										}
										else{
										$StreakCountAuth = "0";
										}
										?>

										<div class="streak-holding-div level1">
				<img src="assets/images/level1.png" width="15" alt="" class="streak-icon">
				<div class="streak-figure">{{$StreakCountAuth}}</div>
			</div>

									<div class="streak-holding-div completed"><img src="assets/images/icons8-ok-48.png" width="15" alt="" class="streak-icon">
										<div class="streak-figure">{{ $task_countAuth }}</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="task-holder">
						<div class="task-list-div">
							<div class="heading-3 no-top-padding">Today's Tasks:<br></div>
							<form id="readytosubmittask" action="{{ URL('submit_task') }}" method="post"/>
								{{ csrf_field() }}
								<div class="todays-tasks" id="TodayTaskList">
									@foreach($tasks as $tasks_not_submitted)
									<div class="task-checkbox">
										<div class="task-text">•
											{{ $tasks_not_submitted->task }}
										</div>
										<!-- <label class="checkbox-icon" for="Check277" onclick="newtasktoggClass(277)" id="nwlb277"></label> -->
										<input name="tskids[]" class="checkbox-icon tasks_ids" type="checkbox" id="Check277" value="{{ $tasks_not_submitted->id }}"  >
									</div>
									@endforeach
									<!--<input type="hidden" name="UidSub" value="357"/>-->
									<!--<input type="hidden" name="TidSub" value="347"/>-->
									<div id="bodyData">
									</div>
									<button type="button" name="button" class="invite-button submit-task-button submit w-button">Submit completed tasks</button>
									<button type="button" name="button" class="invite-button delete-task-button submit w-button">Delete tasks</button>
								</div>
							</form>
						</div>
						<div class="task-list-div">
							<div class="heading-3 no-top-padding">Completed Tasks:<br></div>
							<div class="todays-tasks yesterday" id="CompletdeTaskList">
								@foreach($tasks_submited->take('5') as $tasks_submited)
								<div class="task-checkbox">
									<div class="task-text yesterday">• {{ $tasks_submited->task }}</div>
								</div>
								@endforeach
							</div>
							<a href="{{url('take-history')}}" class="invite-button view w-button">+ View more</a></div>
						</div>
					</div>
				</div>
				<!-- ==============================================================================================================================	 -->
				<!-- Team Tasks Submitted -->
				<?php
					$matchThese = ['user_id' => \Auth::user()->id, 'team_id' => $teamId,'task_status' => 1];
					$task = App\Task::where($matchThese)->get();
				?>
				<div class="grid-box-3">
					<div class="task-list-div full-list">
						<div class="block-head div-line">
							<div class="heading-3 no-top-padding">Team Tasks Submitted</div>
						</div>
						<div class="heading-3 no-top-padding day"><br></div> <!--28th January-->
						<div class="todays-tasks submitted">
							<div class="tasks-submitted">
								<div class="profile-img smaller">
									<div>Z</div>
								</div>
								<a href="#" class="right-streak-content less-margin w-inline-block">
									<div class="username-text">{{ \Auth::user()->name }}</div>
									<div class="streak-info">
										<div class="streak-holding-div level1">
											<img src="{{ URL::asset('assets/images/level1.png') }}" width="15" alt="" class="streak-icon">
											<div class="streak-figure">{{$StreakCountAuth}}</div>
										</div>
										<div class="streak-holding-div completed"><img src="{{ URL::asset('assets/images/icons8-ok-48.png') }}" width="15" alt="" class="streak-icon">
											<div class="streak-figure">{{ $task_countAuth }}</div>
										</div>
									</div>
								</a>
							</div>
							@foreach ($task as $task)
							<div class="task-checkbox">
								<img src="https://streakboard.io/assets/images/green-check.jpg" width="16" alt="" class="check-icon">
								<div class="task-text"> {{ $task->task}}
									<span class="submit-time"></span> </div> <!--6:56am-->
								</div>
								@endforeach
							</div>
							<div id="loadmoreContent"></div>
						</div>
					</div>
					<!--  -->
					<div class="grid-box-4">
						<div class="block-head div-line flex">
							@foreach ($users as $user)
							@if($loop->first)
							<div class="heading-3 no-top-padding _0">{{ $users->team_name}}'s Members (<span id="tMember">1</span>)</div>
							@endif
							@endforeach()
							<a href="{{URL('invite')}}" class="invite-button w-button">+ Invite member</a>
						</div>
						<div class="member-grid">
							@foreach($user_data as $user)
							<div class="member-holder">
								<div class="profile-img smaller">
									<div>O</div>
								</div>
								<div class="right-streak-content">
									<div class="username-text wider">{{ $user->name }}</div>
									<div class="streak-info vertical">
										<?php
										$UserId = $user->Uid;
										$teamId = $user->id;
										$matchThese = ['user_id' => $UserId, 'task_status' => 1, 'team_id' => $teamId];
										$task_count = App\Task::where($matchThese)->count();
										$streaks = App\Streak::where('team_id',$teamId)->where('user_id',$UserId)->first();
											if($streaks)
											{
												$StreakCount = $streaks->streaks_no;
											}
											else{
												$StreakCount = "0";
											}
										?>
										<div class="streak-holding-div level1">
											<img src="assets/images/level1.png" width="15" alt="" class="streak-icon">
											<div class="streak-figure"> {{ $StreakCount }} </div>
										</div>


													<div class="streak-holding-div completed"><img src="assets/images/icons8-ok-48.png" width="15" alt="" class="streak-icon">
			<div class="streak-figure">{{$task_count}}</div>
		</div>
									</div>
								</div>
							</div>
							@endforeach();
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
		@include('pages.footer');

		<script>
		$.noConflict();


		$(".add-task-button").click(function(){
			var name = "";
			var name = $('#New-Task').val();
			var token = $("meta[name='csrf-token']").attr("content");
			$.ajax(
			{
			url: "/add_task_to_database",
			type: 'POST',
			data: {
			"New-Task": name,
			"_token": token,
			},
			success: function (dataResult){
						$("#info").show();
						$("#info").delay(2000).fadeOut();
                location.reload();
					}
			});
		{{--	if(name){--}}
		{{--	$.ajax({--}}
		{{--	url: "/TaskloadData",--}}
		{{--	type: "GET",--}}
		{{--	data:{--}}
		{{--	_token:'{{ csrf_token() }}'--}}
		{{--	},--}}
		{{--	cache: false,--}}
		{{--	dataType: 'json',--}}
		{{--	success: function(dataResult){--}}
		{{--	console.log(dataResult);--}}
		{{--	var resultData = dataResult.data;--}}
		{{--	var bodyData = '';--}}
		{{--	var i=1;--}}
		{{--		bodyData+="<div class='task-checkbox'><div class='task-text'>• "+resultData.task+"</div>"--}}
		{{--					bodyData+="<input name='tskids[]' class='checkbox-icon' type='checkbox' id='Check277' value='"+resultData.id+"' >"--}}
		{{--				bodyData+="</div>";--}}
		{{--$("#bodyData").append(bodyData);--}}
		{{--console.log(resultData.task);--}}
		{{--}--}}
		{{--});--}}
		{{--			}--}}
		{{--	else{--}}
		{{--	console.log("uzii ");--}}
		{{--	}--}}
		});
		$(document).on("change", "input[name='chcktbl1']", function () {
		var status = "Enabled";
		var token = $("meta[name='csrf-token']").attr("content");

		$.ajax(
		{
		url: "/Enabledstreaks",
		type: 'POST',
		data: {
		"status": status,
		"_token": token,
		},
		success: function (response) {
		if (response != 0) {
		//alert("Data Update Successfully!!!!");
		// location.reload();
		}
				}
		});
		});
	$(document).on("change", "input[name='chcktbl2']", function () {
		var status = "Disabled";
		var token = $("meta[name='csrf-token']").attr("content");
		$.ajax(
		{
		url: "/streaks",
		type: 'POST',
		data: {
		"status": status,
		"_token": token,
		},
		success: function (response) {
		if (response != 0) {
		//alert("failed");
		// location.reload();
		}
			}
		});
	});
	</script>
