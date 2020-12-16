<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte {{$nombre_pdf??''}}</title>
    <link href="{{public_path('sources/css/pdf.css')}}" rel="stylesheet">
</head>

<body>
    <header>
        <img src="{{ public_path('sources/img/logo3.png') }}" alt="" class="logo-cabecera">
    </header>
    
    @yield('main')
    <fecha>
        Generado el día {{$fechaGenerado->isoFormat('dddd\, D \d\e MMMM \d\e\l Y \(h:mm A\)')}}
    </fecha>
    <footer>
        <span>Copyright &copy; HERACLES GYM 2020</span>
    </footer>
</body>

</html>