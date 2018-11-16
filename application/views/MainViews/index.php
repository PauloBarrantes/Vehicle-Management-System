<!-- Body Form-->


<div class="container">
    <h1 class="text-center">¡Bienvenido!</h1>


            <div class="container">
                    <div class="card " >
                        <div id='wrap'>
                            <div id='calendar'></div>
                        </div>
                    </div>
            </div>
            <a href="<?php echo site_url();?>vehiculos/reservar"><button class="btn btn-warning centered btn-block"><i class="fas fa-bookmark"></i></i>  Hacer una reservación</button></a>


<div/>
<style>


</style>
<!--  Scripts-->

<script>

	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		/*  className colors

		className: default(transparent), important(red), chill(pink), success(green), info(blue)

		*/


		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/
        <?php
            echo "var reservas = ".json_encode($reservas)."; \n";
        ?>


        console.log(reservas);
        var eventos = [];
        for(var k in reservas) {
           evento = {
               title: reservas[k].nombre + " " + reservas[k].apellido1,
               start: new Date(reservas[k].FechaInicio +"T" +reservas[k].HoraInicio),
               end: new Date(reservas[k].FechaFinalizacion +"T"+ reservas[k].HoraFinalizacion),
               className: 'success'
           };

           eventos.push(evento);
        }
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: false,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: false,
			defaultView: 'month',

			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
            aspectRatio: 2,
			allDaySlot: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			droppable: false, // this allows things to be dropped onto the calendar !!!

            events: eventos



		});



	});

</script>
<style>

#calendar {
    #wrap {
		width: 1100px;
		margin: 0 auto;
		}

	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}

	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}

	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}

	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}

	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

    #calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 900px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		}



</style>

<style>
.fc-header-left, fc-header-center, fc-header-right {
    width: 100%;
    display: block;
}
</style>
