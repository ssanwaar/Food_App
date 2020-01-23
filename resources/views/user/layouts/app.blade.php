<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--head-->    
@include('user/layouts/head')
</head>
<body>
<!--navigation-->
@include('user/layouts/nav')
<!--end of navigation-->

<!--manin contents on the individual pages-->
@section('main-content')

@show
<!--end of main contents section-->

<!--footer-->
@include('user/layouts/footer')
<!--end of footer--> 

<!-- yielding scripts -->
@yield('scripts')

</body>
</html>