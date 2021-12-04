<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.slim.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
</head>

<body>
    <section class="vh-100" style="background-color: #e2d5de;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h6 class="mb-3">Awesome Todo List</h6>
                            {{-- 錯誤訊息 --}}
                            @include('errorMessage')
                            {{-- 建立表單 --}}
                            @include('create')
                            {{-- 資料列表 --}}
                            @include('lists')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
