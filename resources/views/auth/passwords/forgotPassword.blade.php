@include('layouts-main.header')
	 <div id="herohead" class="form-body">
        <div class="form-holder">
            <div class="inner-div">
                <h1 class="h1 centred">Forgot Password</h1>
                <div class="home-subhead dark inner centred">Don&#x27;t have an account? <a href="https://streakboard.io/register" class="link-style">Sign up</a> now</div>
            </div>
            <div class="form-wrap account w-form">
              <form method="POST" action="{{ route('password.email') }}">
                    <label for="Email" class="form-label">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-style w-input @error('email') is-invalid @enderror" maxlength="256" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!-- <input type="email" class="form-style w-input" maxlength="256" name="uemail" placeholder="Enter your email" id="Email" required=""> -->
                    <input type="submit" value="Recover" data-wait="Please wait..." class="submit-button form-submit w-button">
                    <div class="lower-form-text"><a href="{{url('/login')}}" class="link-style colour2">Login instead</a></div>
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
