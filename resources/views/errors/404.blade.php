<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            flex-direction: column;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="flex-center">
        <video class="w-full max-w-md h-auto" autoplay muted loop>
            <source src="{{ asset('errors/404.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        {{-- button for go back --}}
            <a href="javascript:history.back()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                Go Back
            </a>
    </div>
</body>
</html>