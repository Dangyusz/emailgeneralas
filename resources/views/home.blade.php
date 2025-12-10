<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

   @if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
        @endforeach
    </ul>
</body>

</html>