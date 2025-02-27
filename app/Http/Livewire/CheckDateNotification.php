<?php

namespace App\Http\Livewire;

use App\Models\Maintenance as ModelsMaintenance;
use Carbon\Carbon;
use Livewire\Component;

class CheckDateNotification extends Component
{
    public $notifications;
    public $notificationCount;
    

    public function mount()
    {
        $this->fetchNotifications();
    }

    // Récupère les notifications non lues et celles dont la date correspond à aujourd'hui
    public function fetchNotifications()
    {
        $today = Carbon::today()->toDateString(); // Récupère la date du jour en format 'YYYY-MM-DD'

        // Récupère les notifications non lues et celles dont la date est égale à aujourd'hui
        $this->notifications = ModelsMaintenance::where('dateMaintenance', $today)
            ->where('read', false)
            ->get();

        $this->notificationCount = $this->notifications->count();
    }

    // Marque une notification comme lue
    public function markAsRead($id)
    {
        $notification = ModelsMaintenance::find($id);
        $notification->update(['read' => true]);
        
        $this->emit('notificationUpdated');
        $this->fetchNotifications(); 
    }

    public function render()
    {
        Carbon::setLocale("fr");
        $this->fetchNotifications();
        return view('livewire.check-date-notification')
        ->extends("layouts.principal");
      //  ->section("contenu");
    
    }
}
