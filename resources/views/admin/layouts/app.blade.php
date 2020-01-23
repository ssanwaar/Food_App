<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin/layouts/head')
</head>
<body class="hold-transition skin-blue sidebar-mini">

@include('admin/layouts/header')

@include('admin/layouts/sidebar')

@section('main-content')

@show

@include('admin/layouts/footer')

</body>
</html>