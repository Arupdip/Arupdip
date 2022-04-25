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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<color-palate>
		<svg version="1.1" id="Layer_1"
    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 600 600">
			<g>
				<circle fill="var(--color1)" cx="301.073" cy="300.173" r="300"/>
				<circle fill="#fff5" cx="301.073" cy="300.173" r="160" stroke="#fff" stroke-width="10" />
				<path fill="transparent" d="M301.074,108.027c106.119,0,192.146,86.027,192.146,192.146s-86.026,192.146-192.146,192.146
				c-106.12,0-192.146-86.027-192.146-192.146S194.955,108.027,301.074,108.027z" id="curve" />
				<circle fill="#39B790" class="clr clr-1" />
				<circle fill="#028cd1" class="clr clr-2" />
				<circle fill="#9039B7" class="clr clr-3" />
				<circle fill="#0a4541" class="clr clr-4" />
				<!-- <circle fill="#B73990" class="clr clr-4" /> -->
				<circle fill="#4715c1" class="clr clr-5" />
			</g>
			<text width="500">
				<textPath xlink:href="#curve">
					Switch Theme
				</textPath>
			</text>
		</svg>
	</color-palate>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a onclick="return prAlert('Do you want to logout?',{confirm:true,'callback':'link',ele:this})" data-href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
