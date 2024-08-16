<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
    <style>
        .read { background-color: lightgreen; }
        .unread { background-color: lightcoral; }
    </style>
</head>
<body>
    <h1>Notifications d'aujourd'hui</h1>
    <p>Nombre de notifications non lues : {{ $unreadCount }}</p>

    <ul>
        @foreach($notificationes as $notification)
            <li class="{{ $notification->isRead() ? 'read' : 'unread' }}">
                {{ $notification->message }} ({{ $notification->notification_date }})
                @if(!$notification->isRead())
                    <form action="{{ route('notificationes.read', $notification->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Marquer comme lue</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
