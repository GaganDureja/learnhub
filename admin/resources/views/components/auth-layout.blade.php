@props(['title' => 'Dashboard'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }} | LearnHub Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="LearnHub Admin - Manage and explore a wide range of online courses across all categories. Build, track, and optimize your learning platform with ease.">
    <meta name="author" content="LearnHub">
    <meta name="keywords"
        content="online courses, learning platform, tutorials, e-learning, skill development, admin panel">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('js/config.js') }}"></script>

    <!-- Vendor css -->
    <link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Page-specific CSS -->
    @stack('css')
</head>

<body>

    <div class="auth-bg d-flex min-vh-100">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xxl-3 col-lg-5 col-md-6">
                <a href="index.html" class="auth-brand d-flex justify-content-center mb-2">
                    <img src="{{ asset('images/logo-dark.png') }}" alt="dark logo" height="26" class="logo-dark">
                    <img src="{{ asset('images/logo.png') }}" alt="logo light" height="26" class="logo-light">
                </a>

                <p class="fw-semibold mb-4 text-center text-muted fs-15">Admin Panel Design by Coderthemes</p>

                <div class="card overflow-hidden text-center p-xxl-4 p-3 mb-0">

                    {{-- Dynamic slot content --}}
                    {{ $slot }}

                </div>
                <p class="mt-4 text-center mb-0">
                    <script>
                        document.currentScript.insertAdjacentText('afterend', new Date().getFullYear());
                    </script>
                    © <a href="https://awlmetaverse.com/" target="_blank">AWL Metaverse pvt ltd</a> - By
                    <a href="https://dream2realityy.in/" target="_blank">
                        <span class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Gagan
                            Dureja</span>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Page-specific JS -->
    @stack('scripts')

</body>


</html>
