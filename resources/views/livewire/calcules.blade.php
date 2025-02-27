<div class="max-w-lg mx-auto p-4">
    <!-- Message de succès -->
    @if($successMessage)
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ $successMessage }}
        </div>
    @endif

    <!-- Formulaire pour ajouter une nouvelle valeur -->
    <div class="mb-6">
        <h2 class="text-xl mb-2">Ajouter une Nouvelle Valeur</h2>
        <div class="flex flex-col space-y-2">
            <input type="text" wire:model="nom" placeholder="Nom" class="border p-2 rounded" />
            @error('nom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <input type="text" wire:model="description" placeholder="Description" class="border p-2 rounded" />
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button wire:click="ajouterValeur" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
        </div>
    </div>

    <!-- Formulaire pour modifier la dernière valeur insérée -->
    @if($valeurId)
        <div class="mb-6">
            <h2 class="text-xl mb-2">Modifier la Dernière Valeur Ajoutée</h2>
            <div class="flex flex-col space-y-2">
                <input type="text" wire:model="editNom" placeholder="Nom" class="border p-2 rounded" />
                @error('editNom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <input type="text" wire:model="editDescription" placeholder="Description" class="border p-2 rounded" />
                @error('editDescription') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <button wire:click="modifierValeur" class="bg-green-500 text-white px-4 py-2 rounded">Modifier</button>
            </div>
        </div>
    @else
        <p class="text-gray-500">Aucune valeur ajoutée pour le moment.</p>
    @endif

    <!-- Optionnel : Liste des toutes les valeurs -->
    {{-- <div>
        <h2 class="text-xl mb-2">Toutes les Valeurs</h2>
        <ul>
            @foreach(Valeur::all() as $valeur)
                <li>{{ $valeur->nom }} - {{ $valeur->description }}</li>
            @endforeach
        </ul>
    </div> --}}
</div>
