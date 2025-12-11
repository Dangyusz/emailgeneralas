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
     <p><strong>Telefonszam:</strong> {{ $user->tell }}</p>
    <p><strong>Cég:</strong> {{ $user->c_name }}</p>
    <p><strong>Beosztás:</strong> {{ $user->job_title}}</p>
     <p><strong>Kép:</strong></p><img src='{{ $user->piclink }}' alt="Leírás a képről"> 
    
    </body>
    
   