<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dom Bosco</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{asset('css/themes/lite-purple.min.css')}}"rel="stylesheet" />
    <link href="{{asset('css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/plugins/toastr.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/plugins/smart.wizard/smart_wizard.min.css')}}" rel="stylesheet" />
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">

        <x-header/>

        <x-sidebar/>

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            @yield('content')

            <!-- Footer Start -->
            <x-footer/>
            <!-- fotter end -->
        </div>
        <!-- ============ Search UI Start ============= -->
        {{-- <x-search_ui/> --}}
    </div>
    <!-- ============ Search UI End ============= -->
    <script src="{{asset('js/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/scripts/script.min.js')}}"></script>
    <script src="{{asset('js/scripts/sidebar.large.script.min.js')}}"></script>
    <script src="{{asset('js/scripts/customizer.script.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.smartWizard.min.js')}}"></script>
    <script src="{{asset('js/scripts/customizer.script.min.js')}}"></script>
    <script src="{{asset('js/scripts/smart.wizard.script.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            // $("[name=born_date]").mask('00/00/00');
            $("[name=cpf]").mask('000.000.000-00', {reverse: true});
            $("[name=phone2]").mask('(00) 00000-0000');
            $("[name=phone1]").mask('(00) 00000-0000');
        });
    </script>
    <script src="{{asset('js/plugins/toastr.min.js')}}"></script>
    <script src="{{asset('js/scripts/toastr.script.min.js')}}"></script>
    <script src="{{asset('js/scripts/form.validation.script.min.js')}}"></script>
</body>

</html>
