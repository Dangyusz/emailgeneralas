<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><strong>Név:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Cég:</strong> {{ $user->company_name }}</p>
    <p><strong>Beosztás:</strong> {{ $user->name}}</p>
    <p><strong>Kép link:</strong> {{ $user->piclink }}</p>
</body>
</html>