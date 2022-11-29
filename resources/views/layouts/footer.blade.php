@php
    function get_current_git_branch(){
        $fname = sprintf( base_path('.git/HEAD') );
        $data = file_get_contents($fname);   
        $ar  = explode( "/", $data );
        $ar = array_reverse($ar);
        return  trim ("" . @$ar[0]) ;
    }
    $build = \App\Models\Config::build()
@endphp
@if (auth()->check())
<footer id="footer" class="footer footer-static footer-light menu-expand">
    <div class="mr-auto float-left align-items-center d-flex fs-7">
    </div>
    <div class="float-right d-flex align-items-center">
        <span class="fs-7">&copy; {{config('app.year')}}. {{config('app.name')}} - <a href="https://github.com/damianulan/wave/blob/prod/LICENSE">MIT</a> | APP: {{strtoupper(config('app.env'))}}
        | {{__('menus.version')}}: {{config('app.version')}} | Build: {{$build}}</span><a class="text-dark" href="https://github.com/damianulan/wave" data-mdb-toggle="tooltip" data-mdb-placement="left" title="{{__('menus.see_repository')}}" target="_blank"><i class="ms-3 fs-5 bi-github"></i></a>
        <i class="mx-2 fs-5 bi-git"></i><span>{{get_current_git_branch()}}</span>
    </div>
</footer>
@endif
<script src="{{asset('themes/vendors/jquery.min.js')}}"></script>
<script src="{{asset('themes/vendors/datepicker.js')}}"></script>
<script src="{{asset('themes/'.$theme.'/app.js')}}"></script>
@yield('page-scripts')
<script>
    // forms datepicker
var datepicker = new Datepicker('.date-input', {
    inline: false,
    multiple: false,
    i18n: {
    months: ['January','February','March','April','May','June','July','August','September','October','November','December'],
    weekdays: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
    time: ['Time', 'Start', 'End']
    },
    inline: false,
    multiple: false,
    ranged: false,
    time: false,

    /**
     * Additional options
     */
    openOn: 'first',
    min: false,
    max: false,
    within: false,
    without: false,
    yearRange: 5,
    weekStart: 0,

    defaultTime: {
        start: [0, 0],
        end: [12, 0]
    },
});
</script>
</div>
</body>
</html>