@include('pages.header')
	<div class="content-holder">
	<div class="content-div">
		<div class="heading-content-div flex">
			<div class="left-section">
				<div class="top-header-area">
					<h1 class="h1">{{  Auth::user()->team_name }}</h1>
						<a href="user/editteam/MzQ3" class="subhead-link edit">Edit</a>
							<a href="{{url('/invite')}}" class="invite-button w-button">+ Invite member</a>
						</div>
			</div>
	   	  	<div class="task-div right">
				   <div class="toggle-text-left">
					<h4 class="h4-head">Going away?</h4>
					<div class="light-subhead darker">Turn on this toggle so that you don&#x27;t lose your streak</div>
				</div>
				<a href="javascript:void(0)" data-ix="toggle" class="togglebutton w-inline-block" onClick="toggleAway(357)">
											<div data-ix="toggle" class="togglebuttongreen"></div>
						<div class="buttontoggle"></div>
	   </a>
			</div>
		</div>
		<div class="flex-area">
			<div class="grid-box-1">
				<div class="block-head">
					<div class="heading-3 no-top-padding">Streak leaderboard 🔥</div>
				</div>

  <?php
  $i=1;
    foreach ($users as $users):?>
                    <div class="streak-block">
  								<div class="position">    <?php echo $i++; ?>
 								</div>
  								<div class="profile-img smaller">
  										<div>O</div>
  								</div>
  								<div class="right-streak-content less-margin">
  									<div class="username-text">  {{ $users->name }}
                  </div>
  									<div class="streak-info">
  									<div class="streak-holding-div level1">
  				           <img src="assets/images/level1.png" width="15" alt="" class="streak-icon">
  				               <div class="streak-figure"></div>
  			                  </div>
  															<div class="streak-holding-div completed"><img src="assets/images/icons8-ok-48.png" width="15" alt="" class="streak-icon">
  			                          <div class="streak-figure">  {{ $count_status }}
  </div>
  		</div>
  											</div>
  								</div>
  							</div>
              <?php endforeach; ?>
							</div>
			<div class="grid-box-2">
				<div class="add-task-div aligned">
					<div class="task-div _70width">
						<h3 class="h3-head">Add task to your list</h3>
						<div class="light-subhead">Submit a task each day to add to your streak</div>
						<div class="w-form">
              <form method="post" action="{{URL('/task')}}" class="flex-form" enctype="multipart/form-data">
								@if (session()->has('message'))
								<div id="TasksubSucc" class="success-msg w-form-done" style="position: absolute; margin: 4px auto; padding: 6px 26px; font-size: 13px; display: none;">
									<div>{{ $message }}</div></div>
								@endif
                 {{ csrf_field() }}
								<input type="text" class="white-form w-input" maxlength="256" name="New-Task" placeholder="e.g. Send email campaign" id="New-Task" required>
								<input type="hidden" id="taskUid" value="357"/>
								<input type="hidden" id="taskTid" value="347"/>
								<input type="submit" onClick="addTask();" value="+ Add Task" data-wait="Adding..." class="add-task-button w-button">
							</form>
								<div id="TasksubFail" class="w-form-fail" style="position: absolute;margin: 4px auto;padding: 6px 26px;font-size: 13px;display:none">
								<div>Oops! Something went wrong.</div>
							</div>
						</div>
					</div>
					<div class="profile-card right-aligned">
						<div class="user-row">
							<div class="profile-img smaller">
																	<div>O</div>
															</div><a href="user/account_setting" class="username-text link">{{ Auth::user()->name }}</a></div>
							<a href="#" class="right-streak-content no-margin w-inline-block">
								<div class="streak-info">
												<div class="streak-holding-div level1">
				<img src="assets/images/level1.png" width="15" alt="" class="streak-icon">
				<div class="streak-figure">
				</div>
			</div>
														<div class="streak-holding-div completed"><img src="assets/images/icons8-ok-48.png" width="15" alt="" class="streak-icon">
			<div class="streak-figure"> {{ $count_status }}</div>
		</div>
										</div>
							</a>
					</div>
				</div>


				<div class="task-holder">
					<div class="task-list-div">
						<div class="heading-3 no-top-padding">Today's Tasks:<br></div>
						<form id="readytosubmittask" action="{{ URL('update') }}" method="post"/>
            {{ csrf_field() }}

							<div class="todays-tasks" id="TodayTaskList">

                <?php foreach ($data1 as $data1): ?>
                <div class="task-checkbox">
                  <div class="task-text">•
                    {{ $data1->task }}
                </div>
                <!-- <label class="checkbox-icon" for="Check277" onclick="newtasktoggClass(277)" id="nwlb277"></label> -->
                <input name="tskids[]" class="checkbox-icon" type="checkbox" id="Check277" value="{{ $data1->id }}"  >
              </div>
                <?php endforeach; ?>
                <input type="hidden" name="UidSub" value="357"/>
								<input type="hidden" name="TidSub" value="347"/>

                <button type="submit" name="button" class="invite-button submit w-button">Submit completed tasks</button>

            	</div>
						</form>
					</div>
					<div class="task-list-div">
						<div class="heading-3 no-top-padding">Completed Tasks:<br></div>
						<div class="todays-tasks yesterday" id="CompletdeTaskList">
              <?php foreach ($submited->take(5) as $submited): ?>
                <div class="task-checkbox">
  									<div class="task-text yesterday">• {{ $submited->task }}</div>
    						</div>
                  <?php endforeach; ?>
						</div>
						<a href="{{url('/take-history')}}" class="invite-button view w-button">+ View more</a></div>
					</div>
				</div>
			</div>
			<div class="grid-box-3">
				<div class="task-list-div full-list">
					<div class="block-head div-line">
						<div class="heading-3 no-top-padding">Team Tasks Submitted</div>
					</div>

										<div id="loadmoreContent"></div>
				</div>
							</div>
							<div class="grid-box-4">
					<div class="block-head div-line flex">

							<div class="heading-3 no-top-padding _0">{{  Auth::user()->team_name }}'s Members (<span id="tMember">1</span>)</div>
															<a href="{{url('/invite')}}" class="invite-button w-button">+ Invite member</a>
                            </div>

					<div class="member-grid">
            <?php foreach  ($userss as $userss): ?>
            <div class="member-holder">
              <div class="profile-img smaller">
                                  <div>O</div>
                              </div>
              <div class="right-streak-content">
                <div class="username-text wider">{{ $userss->name }}</div>
                <div class="streak-info vertical">
                        <div class="streak-holding-div level1">
        <img src="assets/images/level1.png" width="15" alt="" class="streak-icon">
        <div class="streak-figure">0</div>
      </div>
                      <div class="streak-holding-div completed"><img src="assets/images/icons8-ok-48.png" width="15" alt="" class="streak-icon">
      <div class="streak-figure">
  {{ $count_status }}
      </div>
    							</div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
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
