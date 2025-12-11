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
    <h1>Job Types</h1>
    <ul>
       @foreach ($job_types as $job_type)
        <li>{{ $job_type['type'] }} - {{ $job_type['title'] }}</li>
        @endforeach

    </ul>
    
    
</body>
</html>