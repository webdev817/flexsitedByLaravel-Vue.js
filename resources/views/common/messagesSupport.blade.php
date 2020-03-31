<div id="errorsBox">

</div>
@if (isset($errors) && $errors->any())
<div class="">
    <div class="col-12">
        @foreach ($errors->all() as $key => $error)
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ $error }}
        </div>
        @endforeach
    </div>
</div>
@endif

@if (Session::has('status'))
<div class="">
    <div class="col-12">
        <div class="alert   alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {!! Session::get('status') !!}
        </div>
    </div>
</div>
@endif
