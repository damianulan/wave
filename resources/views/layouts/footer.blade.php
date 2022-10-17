<footer id="footer" class="footer footer-static footer-light d-flex menu-expand">
    <div class="mr-auto float-left align-items-center d-flex fs-7">
        <span>COPYRIGHT &copy; {{config('app.year')}}. {{config('app.name')}} - {{__('menus.rights')}}</span><span class="float-md-right d-none d-md-block"></span>

    </div>
    <div class="float-right d-flex align-items-center">
        <span class="fs-7">{{__('menus.version')}}: {{config('app.version')}}</span><a class="text-dark" href="https://github.com/damianulan/wave" data-mdb-toggle="tooltip" data-mdb-placement="left" title="{{__('menus.see_repository')}}" target="_blank"><i class="ms-3 fs-5 bi-github"></i></a>
    </div>
</footer>
<script src="{{asset('themes/vendors/jquery.min.js')}}"></script>
<script src="{{asset('themes/'.$theme.'/app.js')}}"></script>
<script>

</script>
</div>
</body>
</html>