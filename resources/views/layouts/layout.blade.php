<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZNAMO @yield('title', 'Početna')</title>
        <link rel="stylesheet" href="{{asset('src/styles/style.css')}}" >

    @vite(['resources/ts/index.ts', 'resources/sass/style.scss'])
</head>
<body>
    
    <div class="body-wrapper">

        @include('partials.header')
        
        @yield('content')


        @include('partials.footer')
    </div>
    
    <script src="https://kit.fontawesome.com/fb9f5b5c58.js" crossorigin="anonymous"></script>
    <script src="{{ asset('src/index.js') }}"></script>
</body>
</html>