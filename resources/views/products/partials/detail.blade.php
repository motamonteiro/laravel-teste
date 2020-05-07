<p>{{ __('Name') }}: {{ $product->name }}</p>
<p>{{ __('Category') }}: {{ $product->category->name }}</p>
<p>{{ __('Brand') }}: {{ $product->brand->name }}</p>
<p>{{ __('Created at') }}: {{ $product->created_at->format('d/m/Y H:i:s') }}</p>
<p>{{ __('Updated at') }}: {{ $product->updated_at->format('d/m/Y H:i:s') }}</p>
