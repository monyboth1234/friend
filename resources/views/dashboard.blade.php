<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>សូមស្វាគមន៍, {{ Auth::user()->name }}!</h1>
    <p>អ៊ីមែល៖ {{ Auth::user()->email }}</p>
    <p>តួនាទី (Role)៖ <strong>{{ Auth::user()->role }}</strong></p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" style="padding: 8px 15px; background: red; color: white; border: none; cursor: pointer;">ចាកចេញ (Logout)</button>
    </form>
</body>
</html>