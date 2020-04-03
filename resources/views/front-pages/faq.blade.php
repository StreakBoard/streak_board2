@if (Auth::check())
@include('pages.header')
@else
@include('layouts-main.header')
@endif

<div id="herohead" class="inner-hero">
   <div class="inner-div centred">
      <h1 class="h1 middle">Frequently Asked Questions</h1>
      <div class="inner-subhead more-space">You can find the most frequently asked questions below. If you still have questions after reading below, please <a href="{{url('/contact')}}" class="link-style">contact us</a></div>
      <a href="{{ route('register') }}" class="cta-signup w-button">Get started for free</a>
   </div>
</div>
<div class="faq">
   <div class="faq-row w-row">
      <div class="column _1 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">What is Streak?</div>
            <p class="paragraph">Streak helps small teams stay productive by gamifying tasks. For each day you submit a task, you&#x27;ll gain another day to your steak. Compete against your team with a leaderboard, and see what your team have been doing.</p>
         </div>
      </div>
      <div class="col-2 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">What are tasks?</div>
            <p class="paragraph">Tasks are simply to-dos/jobs you undertake, e.g. &#x27;finish writing FAQ page&#x27;, &#x27;contact sales team&#x27;, &#x27;complete email outreach&#x27;.</p>
         </div>
      </div>
      <div class="col-3 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">How do I add a task?</div>
            <p class="paragraph">Type your task into the form under the &#x27;Add task to your list&#x27; title on your team&#x27;s Dashboard page, then click the &#x27;+ Add Task&#x27; button.</p>
         </div>
      </div>
   </div>
   <div class="faq-row w-row">
      <div class="column _1 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">What are streaks?</div>
            <p class="paragraph">Streaks show the number of concurrent days in which you have submitted a task. E.g. if you submit at least one task from Monday to Friday, your streak will be 5. As you submit tasks on concurrent days, your streak will grow until it is broken.</p>
         </div>
      </div>
      <div class="col-2 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">What happens to my streak at the weekend?</div>
            <p class="paragraph">All streaks will remain intact on weekends - they can only break during the standard work week (Monday - Friday). There is no need to do anything in order to prevent your streak breaking at weekends.</p>
         </div>
      </div>
      <div class="col-3 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">What happens when I go on vacation?</div>
            <p class="paragraph">In order to prevent your streak from breaking, you&#x27;ll need to switch the &#x27;Going Away?&#x27; toggle to green (on). When you&#x27;re back, you can switch it back to grey (off).</p>
         </div>
      </div>
   </div>
   <div class="faq-row w-row">
      <div class="column _1 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">How do I create a new team?</div>
            <p class="paragraph">To create a new team, click the &#x27;+ Create Team&#x27; link and follow the steps - it&#x27;s super quick!</p>
         </div>
      </div>
      <div class="col-2 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">How do I join a team?</div>
            <p class="paragraph">In order to join a team, the team owner will need to send you a link via email. Your team owner can invite you by clicking the &#x27;+ Invite Member&#x27; button on the &#x27;Dashboard&#x27; and &#x27;Members&#x27; pages.</p>
         </div>
      </div>
      <div class="col-3 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">Can a team have more than one owner?</div>
            <p class="paragraph">No, each team can only have one member at the moment. Multiple owners and permissions will come in a future update.</p>
         </div>
      </div>
   </div>
   <div class="faq-row w-row">
      <div class="column _1 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">How do I switch active team?</div>
            <p class="paragraph">You can switch teams by clicking the &#x27;Change team&#x27; dropdown and selecting a new team (you must be logged in first).</p>
         </div>
      </div>
      <div class="col-2 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">Does Streak work with Slack?</div>
            <p class="paragraph">We&#x27;re working on Slack integration - this is coming VERY Soon!</p>
         </div>
      </div>
      <div class="col-3 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding"></div>
            <div class="heading-3 no-top-padding">How do I remove team members?</div>
            <p class="paragraph">To remove team members, go to the &#x27;Members&#x27; page (you must be a team owner) and click the &#x27;X&#x27; icon on any members you&#x27;d like to remove.</p>
         </div>
      </div>
   </div>
   <div class="faq-row w-row">
      <div class="column _1 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">Is there a free trial?</div>
            <p class="paragraph">Every account starts off on the &#x27;free&#x27; plan until limits are reached, at which point you can upgrade to one of our paid plans.</p>
         </div>
      </div>
      <div class="col-2 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">What&#x27;s your refund policy?</div>
            <p class="paragraph">If you&#x27;re unhappy with Streak for any reason, please let us know and we&#x27;ll offer you a full refund for the month&#x27;s use. Each account starts off on the &#x27;free&#x27; plan so you can try before you buy.</p>
         </div>
      </div>
      <div class="col-3 w-col w-col-4 w-col-stack">
         <div class="hiw-div">
            <div class="heading-3 no-top-padding">Can I cancel/downgrade my subscription?</div>
            <p class="paragraph">Yes! Navigate to your &#x27;Billing&#x27; page (when logged in) and you&#x27;ll see two options; Downgrade Plan and Cancel Plan.</p>
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
@include('layouts-main.footer')
