<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Carbon\Carbon;
use Livewire\Component;

class Teste extends Component
{
    public $dates = false;

    public function mount(){
        $today = Carbon::today();
        $this->dates = Upload::whereDate('dat',$today)->exists();
    }

  /*  //calcute date
   public $posts;

   public function mount(){
       $this->posts = Upload::all()->map(function ($post){
            $post->days_diff = Carbon::today()->diffInDays(Carbon::parse($post->date_diff));
            return $post;
            $this->triggerNotification();
       });
   }*/

 //  notificationSound
 /*  public function triggerNotification(){
    $this->emit('playNotificationSound');
   }*/

    public function render()
    {
      //  $isToday = Carbon::parse($this->date->dat)->isToday();
      //  return view('livewire.teste',['isToday' => $isToday])
      return view('livewire.teste')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
