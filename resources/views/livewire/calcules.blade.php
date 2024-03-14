<div>
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'calculateAndAdd'}}">
     <input type="number" wire:model="value" id="value">
     <button type="submit">{{ $editMode ? 'Mettre à jour' : 'Ajouter'}}</button>
     </form>
<div class="pt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0 table-striped">           
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Valeur</th>
                                <th class="text-center">Difference</th>
                                <th class="text-center">Difference cumulative</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($values as $index => $value)
                         <tr>         
                            <td class="text-center">{{$value->id}}</td>
                            <td class="text-center">{{$value->value}}</td>
                            <td class="text-center">{{$value->difference}}</td>
                            <td class="text-center">{{$value->old_value}}</td>
                            <td class="text-center">
                            @if ($index == 0 && isset($values[1]))
                                {{$value->difference + $values[1]->difference}}
                            @endif
                            </td>
                            <td class="text-center">
                                <button wire:click="edit({{$value->id}})">Edit</button>
                            </td>
                        </tr>
                       @empty
                         <tr>
                            <td colspan="9">
                                <div class="alert alert-info">

                                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                    Cet article ne dispose pas encore de tarifs.
                                </div>
                            </td>
                        </tr>  
                       @endforelse    
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.card -->
    </div>
</div>
</div>