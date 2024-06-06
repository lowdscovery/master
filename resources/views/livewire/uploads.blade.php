<div>
    @if (session()->has('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile">
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" wire:model.lazy="nom">
            @error('nom') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" wire:model.lazy="password">
            @error('password') <span style="color: red;">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" id="password_confirmation" wire:model.lazy="password_confirmation">
        </div>

        <div>
            <label for="photo">Image de profil</label>
            <input type="file" id="photo" wire:model="photo">
            @error('photo') <span style="color: red;">{{ $message }}</span> @enderror

            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="Image de profil" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>

        <button type="submit">Mettre à jour le profil</button>
    </form>
</div>
