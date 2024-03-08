<div>
    <form wire:submit.prevent="{{ $editId ? 'updateTransaction' : 'addTransaction'}}">
     <input type="number" wire:model="value" placeholder="Entrer" step="0.01">
     <button type="submit">{{ $editId ? 'Update Transaction' : 'Add Transaction'}}</button>
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
                                <th class="text-center">Old Value</th>
                                <th class="text-center">New Value</th>
                                <th class="text-center">Difference</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                       @forelse ($this->transactions as $transaction)
                         <tr>         
                            <td class="text-center">{{$transaction->id}}</td>
                            <td class="text-center">{{$transaction->old_value}}</td>
                            <td class="text-center">{{$transaction->value}}</td>
                            <td class="text-center">{{$transaction->difference}}</td>
                            <td class="text-center">
                                <button wire:click="editTransaction({{$transaction->id}})">Edit</button>
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