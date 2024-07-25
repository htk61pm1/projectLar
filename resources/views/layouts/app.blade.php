<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="row">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item m-1">
                            <a class="nav-link" aria-current="page" href="{{ route('women.index')}}">Women</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Footer content -->
</footer>

<script src="{{ asset('js/bootstrap.js') }}"></script>

@if(session('success'))
    <script>
        var toast = document.getElementById('liveToast_success');
        var toastTitle = document.getElementById('toastTitle_success');
        var toastContent = document.getElementById('toastContent_success');

        var toastData = @json(session('success'));
        toastTitle.innerHTML = toastData.title;
        toastContent.innerHTML = toastData.message;

        var liveToast = new bootstrap.Toast(toast);
        liveToast.show();
    </script>
@endif

@if(session('failed'))
    <script>
        var toast = document.getElementById('liveToast_failed');
        var toastTitle = document.getElementById('toastTitle_failed');
        var toastContent = document.getElementById('toastContent_failed');

        var toastData = @json(session('failed'));
        toastTitle.innerHTML = toastData.title;
        toastContent.innerHTML = toastData.message;

        var liveToast = new bootstrap.Toast(toast);
        liveToast.show();
    </script>
@endif

</body>
</html>
