@include('layouts-main.header')
<div id="herohead" class="form-body">
	<div class="form-holder">
		<div class="inner-div">
			<h1 class="h1 centred">Login</h1>
			<div class="home-subhead dark inner centred">Don&#x27;t have an account?
				<a href="{{route('register')}}" class="link-style">Sign up</a> now</div>
			</div>
			<div class="form-wrap account w-form">
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<div class="form-group row">
						<label for="Email" class="form-label">Your email</label>
						<div class="col-md-6">
							<input id="email" type="email" class="form-style w-input @error('email') is-invalid @enderror" maxlength="256" placeholder="Enter Your Email"name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="Password" class="form-label">Your password</label>
						<div class="col-md-6">
							<input id="password" type="password" class="form-style w-input @error('password') is-invalid @enderror" maxlength="256" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
							<button type="submit" class="submit-button form-submit w-button">
							{{ __('Login') }}
							</button>

                            @if (Route::has('password.request'))
							    <div class="lower-form-text"><a  href="{{ route('password.request') }}" class="link-style colour2">Forgot your password?</a></div>
						    @endif

                            <div style="text-align: center">
                                <div style="margin: 30px 0; font-size: 0.7rem; font-weight: bold">
                                    OR
                                </div>
                                <a href="{{ route('login.with', ['apple']) }}" class="btn btn-apple">
                                    {{ __('Sign in with Apple') }}
                                </a>
                                <a href="{{ route('login.with', ['google']) }}" class="btn btn-google">
                                    {{ __('Sign in with Google') }}
                                </a>
                                <a href="{{ route('login.with', ['microsoft']) }}" class="btn btn-microsoft">
                                    {{ __('Sign in with Microsoft') }}
                                </a>
                            </div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="hero-div">
		<div class="left-content"></div>
	</div>
</div>
<!-- remove member confirm popup -->
<div class="overLay"></div>
<div class="confirmPopup">
	<p>Remove this member from your team?</p>
	<p><button class="invite-button view w-button yesdelete">Yes</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="invite-button view w-button" onClick="jQuery(this).parent().parent().hide();jQuery('.overLay').hide();">No</button></p>
</div>
<!-- remove member confirm popup -->
@include('layouts-main.footer')
