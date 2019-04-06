<p>Nome: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Tipo: {{ $user->role }}</p>
<p>Criado em: {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
<p>Atualizado em: {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
