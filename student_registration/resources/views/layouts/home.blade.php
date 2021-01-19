<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dom Bosco</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{ asset('css/themes/lite-purple.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/plugins/toastr.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/plugins/smart.wizard/smart_wizard.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/plugins/datatables.min.css') }}" rel="stylesheet">

<<<<<<< HEAD
=======
    <style>
        .span-red {
            font-size:12px;
            color:red;
        }
    </style>

>>>>>>> 9baf7b4517bdd9af178830b52abb9c489bfc601c
</head>

<body class="text-left">

    <div class="app-admin-wrap layout-sidebar-large">
        <x-header />
        <x-sidebar />
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">

                @yield('content')
            </div>
            <x-footer />
        </div>
    </div>

    <script src="{{ asset('js/plugins/jquery-3.3.1.min.js') }}"> </script>
    <script src="{{ asset('js/plugins/bootstrap.bundle.min.js') }}"> </script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"> </script>
    <script src="{{ asset('js/scripts/script.min.js') }}"> </script>
    <script src="{{ asset('js/scripts/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/scripts/customizer.script.min.js') }}"> </script>
    <script src="{{ asset('js/plugins/jquery.smartWizard.min.js') }}"> </script>
    <script src="{{ asset('js/scripts/customizer.script.min.js') }}"> </script>
    <script src="{{ asset('js/scripts/smart.wizard.script.min.js') }}"> </script>
    <script src="{{ asset('js/plugins/datatables.min.js') }}"> </script>
    <script src="{{ asset('js/scripts/datatables.script.min.js') }}"> </script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"> </script>
    <script>
        $(document).ready(function() {
            $("[name=school_year]").mask('0000');
            $("[name=cpf]").mask('000.000.000-00', {
                reverse: true
            });
            $("[name=cpf1]").mask('000.000.000-00', {
                reverse: true
            });
            $("[name=cep]").mask('00000-000', {
                reverse: true
            });
            $("[name=phone2]").mask('(00) 00000-0000');
            $("[name=phone1]").mask('(00) 00000-0000');
            $("[name=phone3]").mask('(00) 00000-0000');
            $("[name=phone4]").mask('(00) 00000-0000');
        });

    </script>
    {{-- <script src="{{ asset('js/plugins/toastr.min.js') }}"></script>
    --}}
    {{-- <script src="{{ asset('js/scripts/toastr.script.min.js') }}"></script>
    --}}
    <script src="{{ asset('js/scripts/form.validation.script.min.js') }}"></script>
</body>

</html>
