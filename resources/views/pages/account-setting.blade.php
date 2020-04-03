@include('pages.header')
	<div class="content-holder">
	<div class="content-div">
		<div class="heading-content-div flex">
			<div class="left-section">
				<div class="top-header-area">
					<h1 class="h1">Account Settings</h1>
				</div>
				<div class="home-subhead dark inner">Make changes to your account here</div>
			</div>
			<div class="right-section"></div>
			<div class="right-header-section"></div>
		</div>
		@if(session()->has('success'))
		<div class="success-msg w-form-done"><div>  {{ session()->get('success') }}</div></div>
	@endif
	@if(session()->has('info'))
<div class="alert alert-info alert-block">{{ session()->get('info') }} </div>
@endif
				<div class="flex-area vertical">
			<div class="form-wrap account-settings w-form">
				<form  action="{{ URL('edit') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
					<div class="profile-image-control"><label for="Your-name-2" class="form-label centred">Profile image (under 1mb.)</label>
						<div class="split-holder" style="margin:0px">
							<div class="profile-img larger">
							<?php
								$image=auth()->user()->avatar;
								?>

								<?php

if ($image) {
                                   ?> <img src="{{ asset('public/	' . $image) }}" ><?php
}
else{
   ?> <div>0</div> <?php
}

?>
</div>


							<label for="upPhoto" class="submit-button w-button">Change profile image</label>
							<input type="file" id="upPhoto" name="avatar" value="" style="display:none"/>
						</div>
					</div>
					<label for="Your-name" class="form-label">Your name</label>
					<input type="text" class="form-style w-input" maxlength="256" name="uname" placeholder="e.g. John Smith" value="{{ Auth::user()->name  }}" required>
					<label for="Change-email" class="form-label">Change email <span id="Enmatc" style="display:none;color: red;padding: 4px;font-size: 12px;">Email not matched.</span></label>
					<input type="email" maxlength="256" id="uEmail" name="uemail" value="{{ Auth::user()->email }}" class="form-style w-input" required>
					<label for="Confirm-email" class="form-label">Confirm new email</label>
					<input type="email" maxlength="256" id="Confirm-email" name="Confirm-email" class="form-style w-input"onchange="matchemail()" >
					<label for="Change-password" class="form-label">Change password <span id="pnmatc" style="display:none;color: red;padding: 4px;font-size: 12px;">Password not matched.</span></label>
					<input type="password" maxlength="256" name="password" id="Change-password" class="form-style w-input">
					<label for="Confirm-password" class="form-label">Confirm new password</label>
					<input type="password" maxlength="256" id="Confirm-password" name="Confirm-password" class="form-style w-input" onchange="matchpass()">

					<input type="submit" id="UpdSubm" value="Update account" data-wait="Updating..." class="submit-button w-button">
				</form>
				<!--
				<div class="success-msg w-form-done">
					<div>Submission successful!<br></div>
				</div>
				<div class="w-form-fail">
					<div>Oops! Something went wrong while submitting the form.</div>
				</div>
				-->
			</div><a href="{{URL('destroy')}}" class="delete-account-link">Delete my account</a></div>
	</div>
</div>
<script>
	function matchemail(){
		var email=jQuery('#uEmail').val();
		var cemail=jQuery('#Confirm-email').val();
		if(email != cemail){
			jQuery('#Enmatc').show();
			jQuery('#UpdSubm').attr("disabled", true);
		}else{
			jQuery('#Enmatc').hide();
			jQuery('#UpdSubm').attr("disabled", false);
		}
	}
	function matchpass(){
		var pass=jQuery('#Change-password').val();
		var cpass=jQuery('#Confirm-password').val();
		if(pass != cpass){
			jQuery('#pnmatc').show();
			jQuery('#UpdSubm').attr("disabled", true);
		}else{
			jQuery('#pnmatc').hide();
			jQuery('#UpdSubm').attr("disabled", false);
		}
	}
</script>
<!-- remove member confirm popup -->
<div class="overLay"></div>
<div class="confirmPopup">
	<p>Remove this member from your team?</p>
	<p><button class="invite-button view w-button yesdelete">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="invite-button view w-button" onClick="jQuery(this).parent().parent().hide();jQuery('.overLay').hide();">No</button></p>
</div>
<!-- remove member confirm popup -->
@include('pages.footer')
