<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
	<title>Laravel Fullcalender Add/Update/Delete Event Example Tutorial - Tutsmake.com</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
 -->
  <!-- Font Awesome -->


  <link rel="stylesheet" type="text/css" href="{{ asset('calendar/main.css') }}">


<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
<body>
		<div id='calendar'></div>
</body>

<script src="{{ asset('calendar/main.js') }}"></script>

<script>
// $(document).ready(function(){
//     $('#calendar').fullCalendar({
//         header: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'month,agendaWeek,agendaDay'
//         },
//         events: '{{ route('calendar.data') }}',
//         timezone: 'UTC',
//         theme: true,
//         // themeSystem:'bootstrap3'
//     })
// });

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      header: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: '{{ route('calendar.data') }}'
    });

    calendar.render();
  });

	// $(document).ready(function () {
	// 	var SITEURL = "{{url('/')}}";
	// 	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	// 	var calendar = $('#calendar').fullCalendar({
	// 		editable: true,
	// 		events: SITEURL + "/fullcalendar",
	// 		displayEventTime: true,
	// 		editable: true,
	// 		eventRender: function (event, element, view) {
	// 				if (event.allDay === 'true') {
	// 					event.allDay = true;
	// 				}
	// 				else {
	// 					event.allDay = false;
	// 				}
	// 		},
	// 		selectable: true,selectHelper: true,select: function (start, end, allDay) {
	// 			var title = prompt('Event Title:');
	// 			if (title) {
	// 				var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
	// 				var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
	// 				$.ajax({
	// 					url: SITEURL + "/fullcalendar/create",
	// 					data: 'title=' + title + '&start=' + start + '&end=' + end,
	// 					type: "POST",success: function (data) {
	// 						displayMessage("Added Successfully");
	// 					}
	// 				});
	// 				calendar.fullCalendar('renderEvent',{
	// 					title: title,
	// 					start: start,
	// 					end: end,
	// 					allDay: allDay
	// 				},true);
	// 			}
	// 			calendar.fullCalendar('unselect');
	// 		},
	// 		eventDrop: function (event, delta) {
	// 			var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
	// 			var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
	// 			$.ajax({
	// 				url: SITEURL + '/fullcalendar/update',
	// 				data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
	// 				type: "POST",
	// 				success: function (response) {
	// 					displayMessage("Updated Successfully");
	// 				}
	// 			});
	// 		},
	// 		eventClick: function (event) {
	// 			var deleteMsg = confirm("Do you really want to delete?");
	// 			if (deleteMsg) {
	// 				$.ajax({
	// 					type: "POST",
	// 					url: SITEURL + '/fullcalendar/delete',
	// 					data: "&id=" + event.id,
	// 					success: function (response) {
	// 						if(parseInt(response) > 0) {
	// 							$('#calendar').fullCalendar('removeEvents', event.id);
	// 						displayMessage("Deleted Successfully");
	// 						}
	// 					}
	// 				});
	// 			}
	// 		}
	// 	});
	// });

	// function displayMessage(message) {
	// 	$(".response").html(""+message+"");
	// 	setInterval(function() {
	// 		$(".success").fadeOut(); 
	// 	}, 1000);
	// }

</script>
</html>