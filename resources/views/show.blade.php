<?php
?>
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
    <p><strong>email_verified_at</strong> {{ $user->email_verified_at }}</p>
    <p><strong>password:</strong> {{ $user->password }}</p>
    <p><strong>remember_token:</strong> {{ $user->remember_token }}</p>
    <p><strong>created_at:</strong> {{ $user->created_at }}</p>
    <p><strong>updated_at:</strong> {{ $user->updated_at }}</p>

    {{ csrf_token() }}
    


</body>
</html>