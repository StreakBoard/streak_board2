
@include('pages.header')


<div id="herohead" class="form-body">
	<div class="form-holder">
		<div class="inner-div">
			<h1 class="h1 centred">Create a team</h1>
			<div class="home-subhead dark inner centred">You will be a able to invite members once your team has been created</div>
		</div>
    <div class="form-wrap account w-form">
			<form id="wf-form-Invite" action="{{ route('create_team') }}" name="wf-form-Invite" method="POST">
        {{ csrf_field() }}

              <label for="Email-2" class="form-label">Team Name</label>
              <input type="text" class="form-style w-input" name="team_name" placeholder="e.g. Abc Team" id="Email" required=""  value="{{ old('team_name') }}">
                        @if ($errors->has('team_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('team_name') }}</strong>
                                        </span>
                                    @endif
              <input type="submit" value="Create" data-wait="Inviting..." class="submit-button form-submit w-button">
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


@include('pages.footer')
