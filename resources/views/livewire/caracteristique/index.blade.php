<div wire:ignore.self>
    @if($currentPage == PAGEADDFORM)
         @include("livewire.caracteristique.add")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.caracteristique.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.caracteristique.liste")
    @endif

</div>
 

