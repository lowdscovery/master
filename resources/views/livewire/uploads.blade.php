<div>
    <div class="container" style="padding-top: 60px;">
        <div class="row">
           <div class="col-md-6 offset-md-3">
               <div class="card">
                <div class="card-body">

                @foreach ($posts as $post)
                <h1>Different date : {{$post->date_diff}} - {{$post->days_diff}} </h1>
                @endforeach

                @if ($result !==null)
                      <h2>Result : {{$result}}</h2>
                 @endif
                    <form wire:submit.prevent="calculate">
                      <div class="form-group">
                      <label for="number1">Number 1</label>
                      <input type="text" id="number1" wire:model="number1">
                    </div>
                    <div class="form-group">
                      <label for="number2">Number 2</label>
                      <input type="text" id="number2" wire:model="number2">
                    </div>
                    <div>
                    <button type="submit" class="btn btn-success float-right">Calcule</button>
                    </div>
                    </form>
                </div>
              </div>
       </div>
     </div>
   </div>
</div>

<script>
  document.addEventListener('livewire:load', function(){
    Livewire.on('playNotificationSound', () =>{
    let audio = new Audio('/path/zaza.mp3');
    audio.play();
    });
  });
  </script>


<div>
    <div class="container" style="padding-top: 60px;">
        <div class="row">
           <div class="col-md-6 offset-md-3">
               <div class="card">
                <div class="card-body">
                @if ($diffInDays !==null)
                  <h2>Difference Date : {{$diffInDays}}</h2>
                @endif      
                    <form wire:submit.prevent="calculateDiff">
                      <div class="form-group">
                      <label for="inputDate">Date </label>
                      <input type="date" id="inputDate" wire:model="inputDate">
                    </div>
                    <div>
                    <button type="submit" class="btn btn-success float-right">Calcule date</button>
                    </div>
                    </form>
                </div>
              </div>
       </div>
     </div>
   </div>
</div>









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