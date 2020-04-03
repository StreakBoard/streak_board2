@include('pages.header')

	 <div id="herohead" class="form-body">
        <div class="form-holder">
            <div class="inner-div">
                <h1 class="h1 centred">Edit Team</h1>
            </div>
            <div class="form-wrap account w-form">
            @foreach($team_name as $name)
			     <form id="wf-form-Forgot-password" name="wf-form-Forgot-password" action="{{ URL('update_team') }}" method="Post">
                        @csrf

                    <label for="Email" class="form-label">Team Name</label>

                    <input type="text" class="form-style w-input" value="{{ $name->team_name }}" maxlength="256" name="tname" placeholder="Team name" id="Email" required="">

                    <input type="submit" value="Submit" data-wait="Please wait..." class="submit-button form-submit w-button">
                </form>
                @endforeach
            </div>
        </div>
        <div class="hero-div">
            <div class="left-content"></div>
        </div>
    </div>


@include('pages.footer')
