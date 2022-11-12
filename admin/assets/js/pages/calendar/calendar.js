$(function() {

    enableDrag();

    function enableDrag(){

        $('#external-events .fc-event').each(function() {

            $(this).data('event', {

                title: $.trim($(this).text()), // use the element's text as the event title

                stick: true // maintain when user navigates (see docs on the renderEvent method)

            });



            // make the event draggable using jQuery UI

            $(this).draggable({

                zIndex: 999,

                revert: true,      // will cause the event to go back to its

                revertDuration: 0  //  original position after the drag

            });

        });

    }



    $(".save-event").on('click', function() {

        var categoryName = $('#addNewEvent form').find("input[name='category-name']").val();

        var categoryColor = $('#addNewEvent form').find("select[name='category-color']").val();

        if (categoryName !== null && categoryName.length != 0) {

            $('#event-list').append('<div class="fc-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '">' + categoryName + '</div>');

            $('#addNewEvent form').find("input[name='category-name']").val("");

            $('#addNewEvent form').find("select[name='category-color']").val("");

            enableDrag();

        }

    });



    var today = new Date();

    var dd = today.getDate();

    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();



    if(dd<10) { dd = '0'+dd }

    if(mm<10) { mm = '0'+mm } 



    var current = yyyy + '-' + mm + '-';

    var calendar = $('#calendar');



    // Add direct event to calendar

    var newEvent = function(start) {

        $('#addDirectEvent input[name="event-name"]').val("");

        $('#addDirectEvent select[name="event-bg"]').val("");

        $('#addDirectEvent').modal('show');

        $('#addDirectEvent .save-btn').unbind();

        $('#addDirectEvent .save-btn').on('click', function() {

            var title = $('#addDirectEvent input[name="event-name"]').val();

            var classes = 'bg-'+ $('#addDirectEvent select[name="event-bg"]').val();

            if (title) {

                var eventData = {

                    title: title,

                    start: start,

                    className: classes

                };

                calendar.fullCalendar('renderEvent', eventData, true);

                $('#addDirectEvent').modal('hide');

                }

            else {

                alert("Title can't be blank. Please try again.")

            }

        });

    }

    

    // initialize the calendar

    calendar.fullCalendar({

        header: {

            left: 'prev,next, today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'

        },

        defaultDate: today,
        navLinks: true, // can click day/week names to navigate views

        weekNumbers: true,
        weekNumbersWithinDays: true,
        weekNumberCalculation: 'ISO',

        editable: false,
        eventLimit: true, // allow "more" link when too many events

        events: [
            {
              title: 'Gymnasium',
              start: '2022-11-01',
              end: '2022-11-21'
            },
            {
              title: 'Gymnasium',
              start: '2022-08-08',
              end: '2022-08-10'
            },
            {
              id: 999,
              title: 'Gymnasium',
              start: '2022-08-09T16:00:00'
            },
            {
              id: 999,
              title: 'Amphitheater',
              start: '2022-08-16T16:00:00'
            },
            {
              title: 'Conference Room',
              start: '2022-08-11',
              end: '2022-08-13'
            },
            {
              title: 'AVR',
              start: '2022-08-14T10:30:00',
              end: '2022-08-14T12:30:00'
            },
            {
              title: 'Gymnasium',
              start: '2022-08-14T12:00:00'
            },
            {
              title: 'AVR',
              start: '2022-08-14T14:30:00'
            },
            {
              title: 'Amphitheater',
              start: '2022-08-14T17:30:00'
            },
            {
              title: 'Gymnasium',
              start: '2022-08-14T20:00:00'
            },
            {
              title: 'Gymnasium',
              start: '2022-08-14T07:00:00'
            },

        ],

        drop: function(date,jsEvent) {

        // var originalEventObject = $(this).data('eventObject');

        // var $categoryClass = $(this).attr('data-class');

        // var copiedEventObject = $.extend({}, originalEventObject);

        // //console.log(originalEventObject + '--' + $categoryClass + '---' + copiedEventObject);

        // copiedEventObject.start = date;

        // if ($categoryClass)

        //   copiedEventObject['className'] = [$categoryClass];

        // calendar.fullCalendar('renderEvent', copiedEventObject, true);



        // is the "remove after drop" checkbox checked?

        if ($('#drop-remove').is(':checked')) {

                // if so, remove the element from the "Draggable Events" list

                $(this).remove();

            }

        },

        select: function(start, end, allDay) { 

            newEvent(start);

        },

        eventClick: function(calEvent, jsEvent, view) {

            //var title = prompt('Event Title:', calEvent.title, { buttons: { Ok: true, Cancel: false} });



            var eventModal = $('#eventEditModal');

            eventModal.modal('show');

            eventModal.find('input[name="event-name"]').val(calEvent.title);



            eventModal.find('.save-btn').click(function(){

                calEvent.title = eventModal.find("input[name='event-name']").val();

                calendar.fullCalendar('updateEvent', calEvent);

                eventModal.modal('hide');

            });

            // if (title){

            //     calEvent.title = title;

            //     calendar.fullCalendar('updateEvent',calEvent);

            // }

        }

    });

});