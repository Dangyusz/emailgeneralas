<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
</head>
<body>

<h1>Recent Users</h1>

@foreach($recentuser as $user)
    <p>{{ $user->id }}. {{ $user->name }} : {{ $user->email }}</p>
@endforeach

</body>
</html>