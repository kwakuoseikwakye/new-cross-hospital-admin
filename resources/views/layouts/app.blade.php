<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <div class="wrapper">
        @include('includes.nav')
        @include('includes.sidebar')
        <div class="content-page">
            @yield('page-content')
            @include('includes.footer')
        </div>
    </div>
    @include('includes.script')
</body>

</html>
