<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    {{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>

</head>
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

        @include('partials.header')
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @include('partials.sidebar')
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    @if (isset($toolbar))
                        {{$toolbar}}
                    @endif
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        {{$slot}}
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
                @include('partials.footer')
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->

<div class="modal modal-sticky modal-static overflow-hidden" id="modal-form" role="dialog" data-backdrop="false">
    <div class="modal-dialog h-100 d-flex justify-content-center align-items-center " role="document">
        <div class="modal-content ">
            <div class="d-flex flex-stack py-5 ps-8 pe-5 border-bottom">
                <h5 class="fw-bold m-0"></h5>
                <div class="d-flex ms-2">
                    <div class="btn btn-icon btn-sm btn-light-primary ms-2 close" data-bs-dismiss="modal">
                        <i class="fas fa-times"> </i>
                    </div>
                </div>
            </div>
            <div class="d-block  overflow-auto" style="max-height: 550px">
                <div class="append">
                </div>
                <div class="card rounded-0 bg-light-dark ">
                </div>
                <div id="load" class="load" style="display: none; height: 370px;"><img
                        src="{{ asset('images/gif/loading.gif') }}" height="370" width="100%"></div>
            </div>

        </div>
    </div>
</div>


<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
<script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
<script src="assets/js/custom/apps/user-management/users/list/add.js"></script>
<script src="assets/js/widgets.bundle.js"></script>
<script src="assets/js/custom/widgets.js"></script>
<script src="assets/js/custom/apps/chat/chat.js"></script>
<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
{{--    <script src="{{asset('main.js')}}"></script>--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // document.addEventListener('DOMContentLoaded', function() {
        // $(document).on('click','.element',function(){
        //
        //     alert('Clicked');
        //
        // });
        $(document).on('click', '.has_action', function () {
            $('#modal-form #load').show();
            $('#modal-form').show();
            var url = $(this).data('action');
            console.log(url)
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    $('#modal-form .append').html(data);
                    $('#modal-form #load').hide();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $(document).on('submit', '#kt_modal_form', function (event) {
            event.preventDefault();
            $('#modal-form #load').show();

            var form = $(this);
            var formUrl = form.attr('action');
            var method = form.data('method');

            // var formUrl = $(this).action;
            // var method = $(this).data('method');
            console.log(formUrl);
            console.log(method);
            $.ajax({
                url: formUrl,
                type: method,
                dataType: "json",
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data)
                    // Assuming data is an array of objects
                    Swal.fire({
                        text: "Form has been successfully submitted!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        $('#modal-form').hide();
                        $('#areas-table').DataTable().ajax.reload();

                        // if (result.isConfirmed) {
                        //     modal.hide();
                        // }
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
            // More code...
        });

        $(document).on('click', '.close', function () {
            var model = $(this).closest('#modal-form');
            model.hide();
        });
    });


</script>
@stack('scripts')
<!--end::Javascript-->
</body>
<!--end::Body-->
{{--    <body class="font-sans antialiased">--}}
{{--        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">--}}
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            @if (isset($header))--}}
{{--                <header class="bg-white dark:bg-gray-800 shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endif--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </body>--}}
</html>
