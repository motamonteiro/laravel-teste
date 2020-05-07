<p>{{ __('Name') }}: {{ $user->name }}</p>
<p>{{ __('Mail') }}: {{ $user->email }}</p>
<p>{{ __('Role') }}: {{ __($user->role) }}</p>
<p>{{ __('Created at') }}: {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
<p>{{ __('Updated at') }}: {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>