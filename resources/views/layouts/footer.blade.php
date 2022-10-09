<footer id="footer" class="footer footer-static footer-light">
    <p class="mb-0"><span class="float-left d-md-inline-block mt-25">COPYRIGHT &copy; {{config('app.year')}}. {{config('app.name')}} - {{__('menus.rights')}}</span><span class="float-md-right d-none d-md-block"></span>
        <span class="float-right d-none d-md-block">{{__('menus.version')}}: {{config('app.version')}}<a class="dark" href="https://github.com/damianulan/axial" data-toggle="tooltip" data-placement="top" title="{{__('menus.see_repository')}}" target="_blank"><i class="bi bi-github"></i></a></span>
    </p>
</footer>
<script src="{{asset('themes/vendors/jquery.min.js')}}"></script>
<script src="{{asset('themes/'.$theme.'/app.js')}}"></script>
<script>

</script>
</div>
</body>
</html>