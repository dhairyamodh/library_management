<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
@yield('title')
</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../images/favicon.png">

        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />

@yield('link')
</head>
<body class="authentication-bg bg-gradient">

    <div class="account-pages mt-5 pt-5 mb-5">

@yield('content')

</div>
<script src="assets/js/vendor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
@yield('scripts')
</body>
</html>
