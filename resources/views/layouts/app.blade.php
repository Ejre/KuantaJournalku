<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/sass/app.scss')

    <style>
        /* Style Khusus untuk badge pill role dan circle */
        .kj-bg-karyawan {
            background-color: #0bb1a3;
        }

        .kj-input-checkbox {
            padding: 10px;
            border-radius: 7px !important;
            border: 1px solid #8f8f8f;
        }

        .bullet-section {
            width: 1rem;
            height: 32px;
            background-color: var(--bs-primary-bg-subtle) !important;
            border-radius: 4px;
        }
    </style>
    @yield('head')
</head>

<body class="overflow-hidden vh-100">

    <div class="row flex-nowrap g-0 h-100">

        @include('layouts.partials.sidebar')

        <div class="col overflow-auto">
            @include('layouts.partials.navbar')

            <div class="w-100 min-vh-100" style="background-color: #eef1f6;">
                <div class="p-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    @yield('script')
</body>

</html>
