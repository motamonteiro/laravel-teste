<div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
               value="{{ $category->name ?? old('name')  }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>
@if($category->created_at ?? false)
    <div class="form-group row">
        <label for="created_at" class="col-sm-4 col-form-label text-md-right">{{ __('Created at') }}</label>
        <label class="col-md-6 col-form-label">{{ $category->created_at->format('d/m/Y H:i:s') }}</label>
    </div>
@endif
@if($category->updated_at ?? false)
    <div class="form-group row">
        <label for="updated_at" class="col-sm-4 col-form-label text-md-right">{{ __('Updated at') }}</label>
        <label class="col-md-6 col-form-label">{{ $category->updated_at->format('d/m/Y H:i:s') }}</label>
    </div>
@endif
@if($category->deleted_at ?? false)
    <div class="form-group row">
        <label for="deleted_at" class="col-sm-4 col-form-label text-md-right">{{ __('Deleted at') }}</label>
        <label class="col-md-6 col-form-label">{{ $category->deleted_at->format('d/m/Y H:i:s') }}</label>
    </div>
@endif