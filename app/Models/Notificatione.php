<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notificatione extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'notification_date', 'read_at'];

    // Vérifier si la notification est lue
    public function isRead()
    {
        return !is_null($this->read_at);
    }

    // Vérifier si la date de notification est égale à la date actuelle
    public function isToday()
    {
        return $this->notification_date && Carbon::parse($this->notification_date)->isToday();
    }
}
