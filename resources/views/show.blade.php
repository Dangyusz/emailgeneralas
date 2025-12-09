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
  
  @foreach($recentuser as $user)
    <p>{{ $user['id'] }}.{{ $user['name'] }} : {{ $user['email'] }}</p>
@endforeach
<h1>
  
</h1>

</body>
</html>