@props(['img', 'type'])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DDDziennik | {{ $type == 'login' ? 'Login' : "Register"  }}</title>
    <style>
        body {
            margin: 0;
            background: url("{{ Vite::asset('resources/images/'.$img)}}") ;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/'.$type.'.js', 'resources/js/auth_forms.js' ])
</head>
<body class="flex items-center justify-center h-screen">
<div class="border-2 border-tonal-a0/20 dark:border-primary-a0/20 rounded-lg shadow-lg w-11/12 md:w-120 p-8 bg-primary-a0/90 dark:bg-tonal-a10/30 backdrop-blur-xs flex flex-col items-center ">
    {{$slot}}
</div>
<div class="absolute bottom-10 right-15 bg-tonal-a10/30 backdrop-blur-xs flex justify-center items-center px-3 py-1 rounded-lg shadow-lg border-2  {{ $type == "login" ? "border-blue-600/40 hover:border-blue-600/90" : 'border-violet-600/40 hover:border-violet-600/90'  }}  transition-all duration-300 ">
    <a href="/" class="font-consolas text-primary-a0 text-1xl">Back</a>
</div>
</body>
</html>
