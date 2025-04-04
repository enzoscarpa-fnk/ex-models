<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Liste des Utilisateurs</h1>

        <form action="{{ route('users.index') }}" method="GET">
            <input type="text" name="search" class="w-full border border-gray-300 px-3 py-2 mt-4">
        </form>

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function() {
                    let message = document.getElementById('success-message');
                    if (message) {
                        message.style.transition = "opacity 0.5s";
                        message.style.opacity = "0";
                        setTimeout(() => message.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nom</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Rôle</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500">Voir</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 ml-2">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
