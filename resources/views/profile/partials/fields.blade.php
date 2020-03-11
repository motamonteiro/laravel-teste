{{--<p>Nome: {{ $user->name }}</p>--}}
{{--<p>Email: {{ $user->email }}</p>--}}
{{--<p>Tipo: {{ $user->role }}</p>--}}
{{--<p>Criado em: {{ $user->created_at->format('d/m/Y H:i:s') }}</p>--}}
{{--<p>Atualizado em: {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>--}}


<div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Nome') }}</label>

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
    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>

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