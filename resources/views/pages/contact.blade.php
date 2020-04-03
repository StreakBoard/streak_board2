@include('pages.header')
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div id="herohead" class="inner-hero">
	<div class="inner-div">
		<h1 class="h1 centred">Contact Us</h1>
		<div class="inner-subhead">Get in touch if you have any queries, or visit our <a href="{{url('/FAQ')}}" class="link-style">FAQ</a> page</div>
	</div>
</div>
<div class="contact-section">
	<div class="form-holding-div">
		<div class="form-wrap w-form">
			@if(session()->has('message'))
			<div class="success-msg w-form-done"><div>  {{ session()->get('message') }}</div></div>
		</div>
		@endif
				<form name="wf-form-Contact-Form" action="{{ URL('submit')}}" method="post">
					@csrf
				<label for="Contact-Email" class="form-label">Your email</label>
				<input type="email" class="form-style w-input" maxlength="256" name="cemail"  placeholder="Enter your email" id="Contact-Email" value="{{ old('cemail') }}" required>
				@error('cemail')
						<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
				@enderror

				<label for="Message-body" class="form-label">Your message</label>
				<textarea id="Message-body" name="mbody" placeholder="Write your message here" maxlength="5000" required class="form-style text-area w-input" value = "{{ old('mbody') }}"></textarea>
				@error('mbody')
						<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
				@enderror
				<!--Recaptcha2 -->

				<!--<div class="g-recaptcha" data-sitekey="6LfFUr8UAAAAAFVapjyQGWkbLWJafVbbmPBftGoT"></div>-->

				<input type="submit" value="Get in touch" class="submit-button w-button">
			</form>

			@if (Session::get('success'))	<div class="success-msg w-form-done">
				<div>Thank you! Your contact submission has been received.
					<br>
					<br>We&#x27;ll get back to you as soon as possible :).
					<br>
				</div>
			</div>
@endif
			<!--<div class="w-form-fail">-->
			<!--	<div>Oops! Something went wrong while submitting the form.</div>-->
			<!--</div>			-->
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
