<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Détails du profil de {{ $user->name }}</h1>

        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
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

            <div class="mb-4">
                <span class="font-semibold">Nom :</span>
                <span class="ml-2">{{ $user->name }}</span>
            </div>

            <div class="mb-4">
                <span class="font-semibold">Email :</span>
                <span class="ml-2">{{ $user->email }}</span>
            </div>

            <div class="mb-4">
                <span class="font-semibold">Rôle :</span>
                <span class="ml-2">{{ $user->role ?? 'Non défini' }}</span>
            </div>

            <div class="mt-6">
                <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Retour à la liste</a>
                <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-700 ml-2">Modifier</a>
            </div>
        </div>
    </div>
</x-app-layout>
