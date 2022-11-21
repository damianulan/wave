@extends('layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col-12">
        <div class="card p-1">
            <div class="card-header m-0">
                <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">{{__('menus.modules')}}</li>
                      <li class="breadcrumb-item active" aria-current="page">{{__('menus.calendar')}}</li>
                    </ol>
                </nav>
                <h2 class="page-header">
                    {{__('menus.calendar')}} 
                </h2>
            </div>
        </div>
    </div>
</div>
@include('components.alerts')
<div class="row my-3">
    <div class="col-12">
        <div class="card p-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body pt-2 px-4">
                        <div id="calendar" class="p-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-scripts')
<script src="{{asset('themes/vendors/fullcalendar/calendar.js')}}"></script>
@if (config('app.locale') != 'en')
    <script src="{{asset('themes/vendors/fullcalendar/locales/'.config('app.locale').'.js')}}"></script>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            locale: '{{config('app.locale')}}',
            initialDate: '{{now()}}',
            weekNumbers: false,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            nowIndicator: true,
            dayMaxEvents: true, // allow "more" link when too many events
            // showNonCurrentDates: false,
            events: [
              {
                title: 'All Day Event',
                start: '2020-09-01'
              },
              {
                title: 'Long Event',
                start: '2020-09-07',
                end: '2020-09-10'
              },
              {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-09-09T16:00:00'
              },
              {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-09-16T16:00:00'
              },
              {
                title: 'Conference',
                start: '2020-09-11',
                end: '2020-09-13'
              },
              {
                title: 'Meeting',
                start: '2020-09-12T10:30:00',
                end: '2020-09-12T12:30:00'
              },
              {
                title: 'Lunch',
                start: '2020-09-12T12:00:00'
              },
              {
                title: 'Meeting',
                start: '2020-09-12T14:30:00'
              },
              {
                title: 'Happy Hour',
                start: '2020-09-12T17:30:00'
              },
              {
                title: 'Dinner',
                start: '2020-09-12T20:00:00'
              },
              {
                title: 'Birthday Party',
                start: '2020-09-13T07:00:00'
              },
              {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2020-09-28'
              }
            ]
          });
          calendar.render();
  
    });
  
  </script>
@endsection
@endsection