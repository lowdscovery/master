<?php

namespace App\Http\Controllers;

use App\Models\Notificatione;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationeController extends Controller
{
    public $unreadCount;
    public function index()
    {
        // Récupérer toutes les notifications dont la date est égale à aujourd'hui
        $notificationes = Notificatione::whereDate('notification_date', Carbon::today())->get();

        // Compter le nombre de notifications non lues
        $unreadCount = $notificationes->whereNull('read_at')->count();

        return view('notificationes.index', compact('notificationes', 'unreadCount'))
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function markAsRead($id)
    {
        $notification = Notificatione::find($id);
        $notification->update(['read_at' => Carbon::now()]);

        return redirect()->back();
    }
}

