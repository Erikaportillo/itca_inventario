<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Inicio</title>
 @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
 
        @extends('layout.app')

        @section('title','Inicio')

        @section('content')
        <div class="container-fluid">
            <h1>Pantalla de inicio</h1>
        </div>
        
        @endsection

        <div class="container-fluid">
            <h1>Pantalla de inicio</h1>
        </div>

</body>
</html>
