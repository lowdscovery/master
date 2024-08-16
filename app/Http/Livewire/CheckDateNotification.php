<?php

namespace App\Http\Livewire;

use App\Models\YourModel;
use Carbon\Carbon;
use Livewire\Component;

class CheckDateNotification extends Component
{
    public $notifications = [];
    public $notificationCount = 0;

    public function mount()
    {
        // Au démarrage, vérifier les dates
        $this->checkDates();
    }

    public function checkDates()
    {
        // Récupère la date actuelle
        $today = Carbon::today();

        // Cherche les enregistrements où la date est égale à aujourd'hui
        $records = YourModel::whereDate('date', $today)->get();

        foreach ($records as $record) {
            // Ajoute une notification
            $this->notifications[] = 'La date ID ' . $record->id . ' correspond à la date du jour.';
        }

        // Met à jour le compteur de notifications
        $this->notificationCount = count($this->notifications);
    }

    public function render()
    {
        return view('livewire.check-date-notification')
        ->extends("layouts.principal")
        ->section("contenu");
    
    }
}
