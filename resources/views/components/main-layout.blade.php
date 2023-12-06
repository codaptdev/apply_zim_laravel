<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ApplyZim</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col w-full h-full" >
        <x-navbar></x-navbar>
        {{$slot}}
    </div>
</body>
</html>
