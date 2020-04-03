var site_url = jQuery('#site_url').val();

function loadmoretasksTeam(tid,obj){
	jQuery.ajax({
		url: site_url+'ajax/loadmoretasksTeam',
		data: {tid:tid},
		type: 'POST',
		success: function(data) {
			jQuery(obj).parent().find('#loadmoreContent').html(data).hide().fadeIn(3000);
			jQuery(obj).hide();
		},
		error: function() {
			alert('An error has occurred');
		}
	});
}

function loadmoretasksUser(uid,tid,obj){
	jQuery.ajax({
		url: site_url+'ajax/loadmoretasksUser',
		data: {uid:uid,tid:tid},
		type: 'POST',
		success: function(data) {
			jQuery(obj).parent().find('#loadmoreContent').html(data).hide().fadeIn(3000);
			jQuery(obj).hide();
		},
		error: function() {
			alert('An error has occurred');
		}
	});
}

function removeMember1(memrowid){
	jQuery('.yesdelete').attr('onClick','removeMember('+memrowid+')');
	jQuery('.overLay').show();
	jQuery('.confirmPopup').show();
}
function removeMember(memrowid){
	jQuery('.overLay').hide();
	jQuery('.confirmPopup').hide();
	jQuery.ajax({
		url: site_url+'ajax/removeMember',
		data: {memrowid:memrowid},
		type: 'POST',
		success: function(data) {
			var count = jQuery('#tMember').html();
			count = parseInt(count)-1;
			jQuery('#tMember').html(count);
			jQuery('#MemberHoder_'+memrowid).fadeOut(3000);
		},
		error: function() {
			alert('An error has occurred');
		}
	});
}

function toggleAway(uid){
	jQuery.ajax({
		url: site_url+'ajax/toggleAway',
		data: {uid:uid},
		type: 'POST',
		success: function(data) {
			if(data==0){
				alert('An error has occurred');
			}
		},
		error: function() {
			alert('An error has occurred');
		}
	});
}

function addTask(){
	var uid = jQuery('#taskUid').val();
	var tid = jQuery('#taskTid').val();
	var task = jQuery('#New-Task').val();
	if(task==''){
		jQuery('#New-Task').css('border','3px solid #F62A49'); return;
	}else{
		jQuery('#New-Task').css('border','1px solid #fff');
	}
	
	if(uid==''){ jQuery('#TasksubFail').show(); return; }else{ jQuery('#TasksubFail').hide(); }
	if(tid==''){ jQuery('#TasksubFail').show(); return; }else{ jQuery('#TasksubFail').hide(); }
	
	jQuery.ajax({
		url: site_url+'ajax/addtask',
		data: {uid:uid,tid:tid,task:task},
		type: 'POST',
		success: function(data){
			if(data>0){
				jQuery('.togglebuttongreen').attr('style','');
				jQuery('.buttontoggle').attr('style','');
				jQuery('#New-Task').val('');
				jQuery('#TasksubSucc').show().fadeOut(2000);
				var newtask = '<div class="task-checkbox">'+
								'<div class="task-text">• '+task+'</div>'+
								'<label class="checkbox-icon" for="Check'+data+'" onClick="newtasktoggClass('+data+')" id="nwlb'+data+'"></label><input name="tskids[]" type="checkbox"  id="Check'+data+'" value="'+data+'" style="visibility: hidden;">'+
							'</div>';
				 jQuery("#TodayTaskList").prepend(newtask);
			}else{
				jQuery('#TasksubFail').show();
			}
		},
		error: function() {
			alert('An error has occurred');
		}
	});
	
}

function submitTasks(){	
	jQuery.ajax({
		url: site_url+'ajax/submitTasks',
		data: jQuery("#readytosubmittask").serialize(),
		type: 'POST',
		success: function(data) {
			if(data==1){
				jQuery('#TodayTaskList .checked').each(function(){
					var ctask = jQuery('<div class="task-checkbox">'+
									'<div class="task-text yesterday">'+jQuery(this).parent().find('.task-text').html()+'</div>'+
								'</div>').hide();			
					jQuery(this).parent().fadeOut(500).remove();
					jQuery("#CompletdeTaskList").prepend(ctask);
					ctask.fadeIn(1000);					
				});
			}
		},
		error: function() {
			alert('An error has occurred');
		}
	});
}

function newtasktoggClass(tid){
	/* alert('#nwlb'+tid); */
	jQuery('#nwlb'+tid).toggleClass('checked');
}

jQuery(document).ready(function(){
	
	jQuery("#upPhoto").change(function(){
		if(this.files[0]!=undefined){
			var file  = this.files[0];
			getUploadImageUrl(this);
		}
	});
});

function getUploadImageUrl(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
		jQuery(".profile-img").empty().append('<img class="imgprew" src="">');
		jQuery(".profile-img").find(".imgprew").attr("src",e.target.result);
    };

    reader.readAsDataURL(input.files[0]);

  }
}