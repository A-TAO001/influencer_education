<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('js/script.js') }}"></script> 
</head>
<body>
    <div class="common_header">
        <nav>
                 <ul class="header-menu">
                     <li class="header-item">
                         <a href="#" class="nav-page-link" id="jikanwari" role="button"> 時間割 </a>
                     </li>
                     <li class="header-item">
                         <a href="#" class="nav-page-link" id="shintyoku" role="button"> 授業進捗 </a>
                     </li>
                     <li class="header-item settei">
                         <a href="#" class="nav-page-link" id="settei" role="button"> プロフィール設定 </a>
                     </li>
                 
                            
                        @guest
                            @if (Route::has('login'))
                                    <li class="header-login">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                    </li>
                            @endif
                        @else
                                    <li class="header-login">            
                                       <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                       </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                     </form>
                                    </li>
                        @endguest
                        </ul>
        </nav>
           <main class="py-4">
              @yield('content')
           </main>
    </div>
</body>
</html>