<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite([
    'resources/scss/bootstrap.scss',
    'resources/js/app.js',
    'resources/css/app.css',
    ])
</head>

<body data-bs-theme="light" style="background: #ffffff">
    @if ($promoNotification)
    <div
        class="alert tw-text-sm tw-flex tw-items-center tw-justify-start tw-gap-1 alert-primary tw-rounded-none broder-primary">
        <i class="bi bi-bell-fill"></i>{!! $promoNotification !!}
    </div>
    @endif
    <!-- MAIN -->
   
    {{$slot}}
    <!-- MAINAPP -->
    @stack('footer')
</body>

</html>