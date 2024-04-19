<div wire:ignore.self>
    @if($currentPage == PAGECREATEFORM)
         @include("livewire.utilisateurs.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.utilisateurs.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.utilisateurs.liste")
    @endif
    @if($currentPage == PAGEGRILLE)
        @include("livewire.utilisateurs.grille")
    @endif

</div>
