<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}} | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @include('layouts.admin.includes.app_styles')
  
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper" id="app">

        @include('layouts.admin.includes.app_header')

            <div class="content-wrapper">

                <div class="content-header">

                    <div class="container">
                    @include('layouts.admin.includes.message')

                    @yield('content')
                    
                    </div>
                </div>
            </div>
        @include('layouts.admin.includes.app_footer')
    </div>
    @stack('modals')

    @livewireScripts
    @include('layouts.admin.includes.app_scripts')

</body>
</html>
