@if(session('message'))
    <div class="alert {{ session('color') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{ session('message') }}
    </div>
@endif