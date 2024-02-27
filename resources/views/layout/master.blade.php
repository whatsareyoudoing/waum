{{-- header --}}
@include("layout.header")

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- ./wrapper -->

    <div class="wrapper">
        <!-- Navbar -->
        @include("layout.navbar")
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include("layout.sidebar")

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield("main_content")
        </div>

    </div>
    {{-- footer --}}
    @include("layout.footer")
</body>

