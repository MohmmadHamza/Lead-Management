@extends('admin.maintemplate.maintemplate')



@section('content')

<style>
    .btn.focus, .btn:focus {

    box-shadow:none;
}
.no-hover {
    pointer-events: none;
    opacity: 0.6;
}

</style>



  <!--=========================*
           Main Section
   *===========================-->
   <div class="vz_main_container">
    <div class="vz_main_content">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Draggable Events</h4>
                        <!-- the events -->
                        <div id="external-events">
                            @foreach ($mainEvents as $mainEvent)
                            <div  data-company-id="{{ $mainEvent->company_id }}" class="external-event {{$mainEvent->color}}">{{$mainEvent->name}}</div>
                            @endforeach
                            {{-- <div class="custom-control custom-checkbox primary-checkbox mt-3">
                                <input type="checkbox" class="custom-control-input" id="drop-remove">
                                <label class="custom-control-label" for="drop-remove">Remove After Drop</label>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mt-mob-4">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar" class="full_calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--=========================*
                Footer
   *===========================-->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2019. All right reserved. Template by Vizzstudio.</p>
        </div>
    </footer>
    <!--=========================*
            End Footer
   *===========================-->
</div>
<!--=========================*
        End Main Section
*===========================-->

<script>
   
   $(document).ready(function () {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: @json($allEvents).map(event => ({
            ...event,
            allDay: true  // Ensures no time is displayed
        })),

        

        editable: true,
        droppable: true,
        drop: function(date, allDay) {
            var eventTitle = $(this).text();
            var eventColor = $(this).css("background-color");
            var droppedEvent = $(this).data('eventObject');

            if (!droppedEvent) {
                console.error("Error: Event data not found!");
                return;
            }

            var companyId = droppedEvent.company_id;

            if (!companyId) {
                console.warn("Warning: company_id is missing for event:", eventTitle);
                return;
            }

            var tempEvent = {
                title: eventTitle,
                start: date.format(),
                backgroundColor: eventColor,
                borderColor: eventColor,
                company_id: companyId
            };

            // Add temporary event without an ID
            $('#calendar').fullCalendar('renderEvent', tempEvent, true);

            // Send AJAX request to store the event in the database
            $.ajax({
                url: "/calendar/store",
                type: "POST",
                data: {
                    title: eventTitle,
                    start: date.format(),
                    backgroundColor: eventColor,
                    borderColor: eventColor,
                    company_id: companyId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.id) {
                        // Remove the temporary event by title (since it has no ID yet)
                        $('#calendar').fullCalendar('removeEvents', function(ev) {
                            return ev.title === eventTitle && !ev.id;
                        });

                        // Create a new event with the correct ID
                        tempEvent.id = response.id;
                        $('#calendar').fullCalendar('renderEvent', tempEvent, true);
                    }
                },
                error: function(xhr) {
                    console.error("Error storing event: ", xhr.responseText);
                }
            });

            // Remove the event from external events if "Remove After Drop" is checked
            if ($('#drop-remove').is(':checked')) {
                $(this).remove();
            }
        },

        eventClick: function(event) {
            if (event.fixedEvent) {
                alert("This event cannot be deleted.");
                return;
            }
            if (confirm("Delete this event?")) {
                $.ajax({
                    url: "/calendar/destroy/" + event.id,
                    type: "POST", // Change DELETE to POST
                    data: {
                        _method: "DELETE", // Laravel requires this for DELETE
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#calendar').fullCalendar('removeEvents', event.id);
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert("Error deleting event!");
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    });

    function initEvents(ele) {
        ele.each(function () {
            var companyId = $(this).data("company-id"); // Get company ID from data attribute

if (!companyId) {
    console.warn("Warning: Missing company_id for event:", $(this).text());
    companyId = null; // Ensure it is not undefined
}

            var eventObject = {
                title: $.trim($(this).text()),
                company_id: companyId
            };
            $(this).data('eventObject', eventObject);
            $(this).draggable({
                zIndex: 1070,
                revert: true,
                revertDuration: 0
            });
        });
    }

    initEvents($('#external-events div.external-event'));
});

    </script>
    
@endsection