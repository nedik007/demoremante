@extends('_layout.admin')

@section('content')

    <p class="alert alert-primary">Přihlašování je ořezáno na maximální jednoduchost</p>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{route('admin.doLogin')}}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-form-label">{{ __('auth.Login') }}</label>
                            <input id="email" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="email" autofocus>

                            @error('login')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
