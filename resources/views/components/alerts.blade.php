@if (session('success'))
<div class="row justify-content-center mt-4">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
@endif
@if (session('error'))
<div class="row justify-content-center mt-4">
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
@endif
@if (session('warning'))
<div class="row justify-content-center mt-4">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {!! session('warning') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
@endif
@if (session('info'))
<div class="row justify-content-center mt-4">
    <div class="col-md-12">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {!! session('info') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
@endif