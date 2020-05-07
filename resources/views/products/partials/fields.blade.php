<div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
               value="{{ $product->name ?? old('name')  }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif

    </div>
</div>
<div class="form-group row">
    <label for="category_id" class="col-sm-4 col-form-label text-md-right">{{ __('Category') }}</label>
    <div class="col-md-6">
        <select name="category_id" id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
            <option value="">{{ __('Choose') }} {{ __('Category') }}</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if(isset($product)) {{ ($product->category->id == $category->id) ? 'selected' : null }} @else {{ (old('category_id') == $category->id) ? 'selected' : null }} @endif >{{ $category->name }}</option>
            @endforeach
        </select>

        @if ($errors->has('category_id'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="created_at" class="col-sm-4 col-form-label text-md-right">{{ __('Brand') }}</label>
    <div class="col-md-6">
        <select name="brand_id" id="brand_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
            <option value="">{{ __('Choose') }} {{ __('Brand') }}</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" @if(isset($product)) {{ ($product->brand->id == $brand->id) ? 'selected' : null }} @else {{ (old('brand_id') == $brand->id) ? 'selected' : null }} @endif >{{ $brand->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('brand_id'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand_id') }}</strong>
                                    </span>
        @endif
    </div>
</div>
@if($product->created_at ?? false)
<div class="form-group row">
    <label for="created_at" class="col-sm-4 col-form-label text-md-right">{{ __('Created at') }}</label>
    <label class="col-md-6 col-form-label">{{ $product->created_at->format('d/m/Y H:i:s') }}</label>
</div>
@endif
@if($product->updated_at ?? false)
<div class="form-group row">
    <label for="updated_at" class="col-sm-4 col-form-label text-md-right">{{ __('Updated at') }}</label>
    <label class="col-md-6 col-form-label">{{ $product->updated_at->format('d/m/Y H:i:s') }}</label>
</div>
@endif
@if($product->deleted_at ?? false)
    <div class="form-group row">
        <label for="updated_at" class="col-sm-4 col-form-label text-md-right">{{ __('Deleted at') }}</label>
        <label class="col-md-6 col-form-label">{{ $product->deleted_at->format('d/m/Y H:i:s') }}</label>
    </div>
@endif