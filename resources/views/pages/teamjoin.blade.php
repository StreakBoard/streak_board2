@include('layouts-main.header')


//   <!-- fetch name of the team to display in the page-->
	        <?php

            $matchThese = ['id' => $team_id ];
			$team_name = App\Team::where($matchThese)->get();
			?>

	<div id="herohead" class="form-body">
	<div class="form-holder">
					<div class="inner-div">
				<h1 class="h1 centred">You have been invited to join the team: Team</h1>
							</div>
										<div class="form-wrap account centred">
					<div class="user-info">
						<div class="profile-img smaller">
															<div>Z</div>
													</div>


						<a href="#" class="right-streak-content less-margin w-inline-block">
						    @foreach($team_name as $name)
						    	@if($loop->first)
							<div class="username-text right">{{ $name->team_name }}</div>
								@endif

							@endforeach
						</a>
					</div>
					<form id="wf-form-Invitation" name="wf-form-Invitation" action="{{ URL('join/'.$team_id) }}" method="POST">
					    							@csrf

						<input type="hidden" name="team_id" value="405"/>
						<button type="submit" class="submit-button centred w-button">Join team</button>
					</form>
				</div>
						</div>
	<div class="hero-div">
		<div class="left-content"></div>
	</div>
</div>
<script>
	function checkEmail(){
		var eml=jQuery('#userEmailId').val();
		jQuery.ajax({
			url: "https://streakboard.io/user/checkUniqueEmail",
			type: "POST",
			data: {email : eml},
			success: function(res){
				if(res == 1){
					jQuery('#emExist').show();
					jQuery('#RegSubmit').attr("disabled", true);
				}else{
					jQuery('#emExist').hide();
					jQuery('#RegSubmit').removeAttr("disabled");
				}
			}
		});
	}
</script>
<!-- remove member confirm popup -->
<div class="overLay"></div>
<div class="confirmPopup">
	<p>Remove this member from your team?</p>
	<p><button class="invite-button view w-button yesdelete">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="invite-button view w-button" onClick="jQuery(this).parent().parent().hide();jQuery('.overLay').hide();">No</button></p>
</div>
<!-- remove member confirm popup -->

@include('layouts-main.footer')
