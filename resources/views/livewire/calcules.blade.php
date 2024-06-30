<div>
    <input type="text" wire:model="currentValue" placeholder="Valeur Actuelle">

    <button wire:click="saveOrUpdateValue">
        @if($selectedId)
            Modifier
        @else
            Ajouter
        @endif
    </button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Valeur Actuelle</th>
                <th>Différence</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->current_value }}</td>
                    <td>{{ $value->difference }}</td>
                    <td><button wire:click="editValue({{ $value->id }})">Edit</button></td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
