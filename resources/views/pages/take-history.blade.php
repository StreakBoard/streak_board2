
@include('pages.header')

        </div>
    </div>
	<div class="content-holder">
    <div class="content-div">
        <div class="heading-content-div flex">
            <div class="left-section">
                <div class="top-header-area">
                    <h1 class="h1">Your task history</h1>
                </div>
                <div class="home-subhead dark inner">View your task history here</div>
            </div>
            <div class="task-history-right-head"></div>
        </div>
        <div class="flex-area">
            <div class="grid-box-3">
                <div class="task-list-div full-list">
                    <div class="block-head div-line">
                        <div class="heading-3 no-top-padding">Tasks Completed</div>
                    </div>

															<div id="loadmoreContent">
                                <?php foreach ($task_history as $task_history): ?>

                                <div class="task-checkbox">

										<img src="{{ URL::asset('assets/images/green-check.jpg') }}" width="16" alt="" class="check-icon">

										<div class="task-text">    {{ $task_history->task }} </div>

									</div>
                <?php endforeach; ?>
                                </div>
				</div>
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



@include('pages.footer')
