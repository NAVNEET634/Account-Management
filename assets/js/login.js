$(document).ready(function() {

	jQuery('#loginForm').submit(function() {
		
		//jQuery('.black_overlay').show();
		var formData = $("#loginForm").serializeArray();
		var URL = jQuery("#loginForm").attr("action")+"?id="+Math.random();	
		jQuery.ajax({
	    	url : URL,
	    	type: "POST",
	    	data : formData,
		    success: function(data)
		    {
		       if(data=='Invalid')
			   {
				   jQuery('.login-box-msg').html('Invalid username or password.');
				   jQuery('.login-box-msg').css('color','red');
				   jQuery('.login-box-msg').css('font-weight','bold');
			   }
			   else
			   {
				   jQuery('.login-box-msg').html('Login Success');
				   jQuery('.login-box-msg').css('color','green');
				   jQuery('.login-box-msg').css('font-weight','bold');
				   window.location.href=window.location.href;  
			   }
		    }
		});	
		return false;
	});
});

/*function addAppointmentWindow()
{
	showLightbox();	
}

function showLightbox()
{
	jQuery('.lightbox-content').css('top','30px');
	jQuery('.lightbox-content').css('visibility','visible');
	jQuery('.lightbox-content').css('opacity','1');
	jQuery('.lightbox-loader').show();
}

function hideLightbox()
{
	jQuery('.lightbox-content').css('top','-1000px');
	jQuery('.lightbox-content').css('visibility','hidden');
	jQuery('.lightbox-content').css('opacity','0');
	jQuery('.lightbox-loader').hide();
}




var app = angular.module('appointmentApp', []);
app.controller('appointmentCtrl', function($scope, $http) 
{
	jQuery('.black_overlay').show();
	$http.get(jQuery('#videoType').attr('ajaxUrl'))
  	.success(function (response) 
  	{
  		jQuery('.black_overlay').hide();
  		$scope.appScope = response;
  	});
		
});



$(document).ready(function() {


	jQuery('.lightbox-loader').click(function() {		
		hideLightbox();		
	});
	
	jQuery('#appDuration').change(function() {
		var duration=jQuery('#appDuration').val();
		
		$.get(jQuery('#changeDateFormat').val()+'?callType=calculateEndTime&duration='+duration+'&currentDateTime='+jQuery('#appStartTime').val()+'&id='+Math.random(), function(data,status) 
		{
			var jsObj = angular.fromJson(data);
			jQuery('.black_overlay').hide();
			jQuery('#EndTime').val(jsObj.endTime);
		});	
		
	});
	
	jQuery('#eventForm').submit(function () 
	{
		jQuery('.black_overlay').show();
		var formData = $("#eventForm").serializeArray();
		var URL = $("#eventForm").attr("action")+"?id="+Math.random();	
		$.ajax({
	    	url : URL,
	    	type: "POST",
	    	data : formData,
		    success: function(data)
		    {
		       window.location.href=window.location.href;
		    }
		});	
		return false;    
	});
	
	
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'agendaDay, month, agendaWeek,list, resourceDay, pec',
		},
		editable: false,
		defaultTimedEventDuration:'00:15:00',
		defaultView: 'resourceDay',
		minTime: '07:00:00',
		maxTime: '21:00:00',
		allDaySlot:false,
		//slotDuration = '00:15:00',
      	droppable: false, 
      	     	
		dayClick: function(date, jsEvent, view, event) 
		{			
			var currentDateTime=formatDate(date, 'yyyy-MM-dd H(:mm)')+':00';	
			//alert(currentDateTime);
			jQuery('.black_overlay').show();
			jQuery.get(jQuery('#changeDateFormat').val()+'?callType=changeFormat&currentDateTime='+currentDateTime+'&id='+Math.random(), function(data,status) {
			     
			     jQuery('#videoType').val('');
				 jQuery('#eventId').val('');
				 jQuery('#StartTime').val('');
				 jQuery('#EndTime').val('');
				 jQuery('#comment').val('');
				 jQuery('#myModalLabel').html('');
				 jQuery('#appDuration').val('');
				 jQuery('#appStartTime').val('');
	   
	   			 var jsObj = angular.fromJson(data);
			     jQuery('.black_overlay').hide();
			     jQuery('#myModalLabel').html(jsObj.startTime);
			     jQuery('#StartTime').val(jsObj.startTime);
			     jQuery('#appDuration').val('60');
			     jQuery('#EndTime').val(jsObj.endTime);
			     jQuery('#appStartTime').val(currentDateTime);
			     addAppointmentWindow();
			     
			 });
		},
		
		resources: [{"id":"209","name":"Richard"},{"id":"210","name":"Joe"},{"id":"213","name":"Ravi"},{"id":"211","name":"Mary"},{"id":"212","name":"Kris"}],
		
		events: jQuery('#eventsFeed').val()+"?contactId="+jQuery('#contactId').val()+"&randomId="+Math.random(),
		
		
	});


});

function editEvent(eventId)
{
	jQuery('.black_overlay').show();
	jQuery.get(jQuery('#getEventById').val()+'?&appId='+eventId+'&id='+Math.random(), function(data, status)
	{
	   jQuery('.black_overlay').hide();
	   var jsObj = angular.fromJson(data);
	   jQuery('#videoType').val(jsObj.scope);
	   jQuery('#eventId').val(jsObj.id);
	   jQuery('#StartTime').val(jsObj.start);
	   jQuery('#EndTime').val(jsObj.end);
	   jQuery('#comment').val(jsObj.comment);
	   jQuery('#myModalLabel').html(jsObj.start);
	   jQuery('#appDuration').val(jsObj.duration);
	   jQuery('#appStartTime').val(jsObj.eventStartTime);	
	   showLightbox();
	});	
}

function removeEvent(eventId)
{
	if(confirm('Do you want to delete appointment?'))
	{
		jQuery('.black_overlay').show();
		jQuery.get(jQuery('#eventsDelete').val()+'?&appId='+eventId+'&id='+Math.random(), function(data, status)
		{
	       jQuery('.black_overlay').hide();	
	       $("#calendar").fullCalendar("removeEvents");
		   $("#calendar").fullCalendar("refetchEvents");
		});
	}	
}
*/