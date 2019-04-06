@if (session('type') ?? false)
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('message') }}
    </div>
@endif
