<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle-->
    <link href="{{asset('/')}}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/custom.style.css" rel="stylesheet" type="text/css" />
    <!-- Styles -->

    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    @inertia

    @env ('local')
    <script src="http://localhost:8080/js/bundle.js"></script>
    @endenv

    <script src="{{asset('/')}}assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{asset('/')}}assets/js/scripts.bundle.js"></script>
    <script src="{{asset('/')}}assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
</body>

</html>