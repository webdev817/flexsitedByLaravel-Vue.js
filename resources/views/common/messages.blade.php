<div id="errorsBox">

</div>
@if (isset($errors) && $errors->any())
<div class="">
    @foreach ($errors->all() as $key => $error)
    <div class="alert alert-solid alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{ $error }}
    </div>

    @endforeach
</div>
@endif

@if (Session::has('status'))
<div class="">
<div class="alert alert-solid alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    {!! Session::get('status') !!}
</div>

</div>
@endif
