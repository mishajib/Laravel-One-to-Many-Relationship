<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('site-title', 'Enter title here')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Toastr Css -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Toastr Css End -->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-primary text-center mt-2">
                <div class="card-header">
                    <h2 class="card-title">
                        @yield('header-title', 'Enter Header Title Here')
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
