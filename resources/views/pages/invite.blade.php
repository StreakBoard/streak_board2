
@include('pages.header')

<div id="herohead" class="form-body">
  <div class="form-holder">
    <div class="inner-div">
        <?php
        $team_id = Session::get('team_id');
        $matchThese = ['id' => $team_id];
    $teamsData  = App\Team::where($matchThese)->first();
    $TeamName=$teamsData->team_name;
        ?>
        <h1 class="h1 centred">Invite members to your team: {{$TeamName}}</h1>
        <div class="home-subhead dark inner centred">Enter the recipient&#x27;s email below</div>
        @if (session('error'))
                   <div class="alert alert-danger">
                       <p>{{ session('error') }}</p>
                   </div>
               @endif

               @if (session('success'))
                   <div class="alert alert-success">
                       <p>{{ session('success') }}</p>
                   </div>
               @endif
    </div>
    <div class="form-wrap account w-form">
      <form id="wf-form-Invite" action="{{URL('show')}}" name="wf-form-Invite" method="Get">
        {{ csrf_field() }}

              <label for="Email-2" class="form-label">Email</label>
              <input type="email" class="form-style w-input" name="uemail" placeholder="e.g. john@smith.com" id="Email" required=""  value="{{ old('email') }}">
                        @if ($errors->has('uemail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uemail') }}</strong>
                                        </span>
                                    @endif
              <input type="submit" value="Invite" data-wait="Inviting..." class="submit-button form-submit w-button">
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
