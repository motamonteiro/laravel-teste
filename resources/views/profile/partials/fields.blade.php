<div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
               value="{{ $user->name ?? old('name')  }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>


<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Mail') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
               value="{{ $user->email ?? old('email')  }}" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
    </div>
</div>

<div class="form-group row">
    <label for="role" class="col-sm-4 col-form-label text-md-right">{{ __('Role') }}</label>
    <label class="col-md-6 col-form-label">{{ __($user->role) }}</label>
</div>

<div class="form-group row">
    <label for="created_at" class="col-sm-4 col-form-label text-md-right">{{ __('Created at') }}</label>
    <label class="col-md-6 col-form-label">{{ $user->created_at->format('d/m/Y H:i:s') }}</label>
</div>

<div class="form-group row">
    <label for="updated_at" class="col-sm-4 col-form-label text-md-right">{{ __('Updated at') }}</label>
    <label class="col-md-6 col-form-label">{{ $user->updated_at->format('d/m/Y H:i:s') }}</label>
</div>
