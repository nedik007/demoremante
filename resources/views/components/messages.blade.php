@if (\Session::has('success'))
    <div class="alert alert-warning">
        {!! \Session::get('success') !!}
    </div>
@endif

@if (\Session::has('error'))
    <div class="alert alert-danger">
        {!! \Session::get('error') !!}
    </div>
@endif


@if($errors->any())
    @if ($errors->count() == 1)
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @else
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endif

