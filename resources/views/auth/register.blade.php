@include('layouts-main.header')
<body class="body">
	<input type="hidden" id="site_url" value="index.html"/>
	<div id="herohead" class="form-body">
		<div class="form-holder">
			<div class="inner-div">
				<h1 class="h1 centred">Sign up</h1>
				<div class="home-subhead dark inner centred">Already have an account? <a href="{{route('login')}}" class="link-style">Login</a> now</div>
			</div>
			<div class="form-wrap account w-form">
				<form method="POST" action="{{ route('register') }}" >
					@csrf
					<input type="hidden" name="register" >
					<div class="form-group row">
						<label for="Company-name" class="form-label">Team name*</label>
						<div class="col-md-6">
							<input id="team_name" type="text" class="form-style w-input @error('team_name') is-invalid @enderror" placeholder="e.g Alphabet" name="team_name" value="{{ old('team_name') }}" required autocomplete="Team_Name" autofocus>
							@error('team_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="Your-name" class="form-label">Your name*</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-style w-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="e.g Jessica" required autocomplete="name" autofocus>
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="Email-2" class="form-label">Your email* <span id="emExist" style="display:none;color: red;padding: 4px;font-size: 12px;">Email already exsist.</span></label>
						<div class="col-md-6">
							<input id="email" type="email" class="form-style w-input @error('email') is-invalid @enderror" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="Password" class="form-label">Your password*</label>
						<div class="col-md-6">
							<input id="password" type="password" class="form-style w-input @error('password') is-invalid @enderror" placeholder="Enter Your Password" name="password" required autocomplete="new-password">
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="Password" class="form-label">Confirm password*</label>
						<div class="col-md-6">
							<input id="password-confirm" type="password" class="form-style w-input @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
						</div>
					</div>
					<div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="submit-button form-submit w-button">
							{{ __('Register') }}
							</button>
						</div>
					</div>
				</form>
				<!-- <form method="POST" action="{{ route('register') }}">
										<input id="team_name" type="text"  maxlength="256" class="form-style w-input @error('team_name') is-invalid @enderror" name="team_name" value="{{ old('team_name') }}" required autocomplete="Team_Name" autofocus>
										@error('team_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
								<input id="name" type="text" class="form-style w-input @error('name') is-invalid @enderror" maxlength="256" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
								@error('name')
										<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
										</span>
								@enderror
								<input id="email" type="email" onChange="checkEmail()"  maxlength="256" class="form-style w-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
								<input id="password" type="password"  class="form-style w-input @error('password') is-invalid @enderror" maxlength="256" name="password" required autocomplete="new-password">
								@error('password')
										<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
										</span>
								@enderror
								<button type="submit" id="RegSubmit" value="Sign up" data-wait="Joining..." class="submit-button form-submit w-button">
				</form> -->
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
				url: "https://streaknoard.io/user/checkUniqueEmail",
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
