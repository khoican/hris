<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <div class="d-flex mx-auto" style="max-width: 100vw;">
        <div style="width: 20%;">
            @include('includes.sidebar')
        </div>

        <div class="p-3" style="width: 80%;">
            @yield('content')
        </div>
    </div>
</body>

</html>
