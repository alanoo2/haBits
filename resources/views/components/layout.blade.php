@props([
'title' => ''
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body>

    <!-- <x-nav/> -->
    <body>
        <video class="video-bg" autoplay muted loop>
            <source src="{{ asset('video/bg_login.mp4') }}" type="video/mp4">  
        </video>
        {{ $slot }}
    </body>

   <!-- <footer class="flex bg-black text-white p-3 px-20 position absolute bottom-0 w-full justify-between content-center items-center">
        <div class="">
            info
        </div>
        <div>
            <img class="w-10 h-10 rounded-full" src="{{ asset('img/ig.jpg') }}" alt="ig">
        </div>
    </footer> -->
</body>
</html>