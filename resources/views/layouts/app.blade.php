<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/storage/style.css') }}" rel="stylesheet">

</head>
<body style="display: flex; min-height:100vh; flex-direction:column; background-image: url(/storage/m1.jpg); background-repeat: repeat;">
    <main style="flex: 1">
    <div id="app">
        @include('inc.navbar')
        <main class="py-4">
            <div class="container">
            @include('inc.messages')
            @yield('content')
            </div>
        </main>
    </div>
    </main>
    <div class="footer">
        © 2021 Copyright: WEB SYSTEM & TECHNOLOGIES
        <pre><b>19010819-021 Nabeel Yousaf <a href="mailto:19010819-021@uog.edu.pk">@bolanian273</a> & 19810819-002 Umaid Asif</b></pre>

      </div>
    {{-- <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2021 Copyright: WEB SYSTEM & TECHNOLOGIES
          <pre><b>19010819-021 Nabeel Yousaf & 19810819-002 Umaid Asif</b></pre>
        </div>
        <!-- Copyright -->
      </footer> --}}
      <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
