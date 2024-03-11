
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite("resources/css/app.css")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <x-header />
    <x-nav />
    <main class = "h-65v bg-main">
        <!-- Lo que te pasen de contenido va en la variable slot . Dentro de el contenido de prueba.blade -->
        {{$slot}}
    </main>
    <x-footer />
</body>
</html>
