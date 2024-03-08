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