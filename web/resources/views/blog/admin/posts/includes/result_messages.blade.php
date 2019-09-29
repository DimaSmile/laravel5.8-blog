@if ($errors->any())
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="alert alert-danger" role="alert">
            <button class="alert-dismissible close fade show" data-dismiss="alert"><span aria-hidden="true">x</span></button>
            <strong>{{ $errors->first() }}</strong>
            <ul>
                @foreach ($errors->all() as $errorTxt)
                    <li>{{ $errorTxt }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

@if (session('success'))
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="alert alert-success" role="alert">
            <button class="alert-dismissible close fade show" data-dismiss="alert"><span aria-hidden="true">x</span></button>
            <strong>{{ session()->get('success') }}</strong>
        </div>
    </div>
</div>
@endif