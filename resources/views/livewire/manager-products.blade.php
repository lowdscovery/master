<div>
    <ul>
        @foreach ($products as $product)
            <li>
                {{ $product->name }}
                @can('update', $product)
                    <button wire:click="editProduct({{ $product->id }})">Modifier</button>
                @endcan
                @can('delete', $product)
                    <button wire:click="deleteProduct({{ $product->id }})">Supprimer</button>
                @endcan
            </li>
        @endforeach
    </ul>
</div>
