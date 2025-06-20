<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Tour Du Lịch,Booking</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            
            
 
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.include.sidebar', ['role' => Auth::user()->role])


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
            
        </div>
    </section>
</div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('backend/dist/js/demo.js')}}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend/dist/js/pages/dashboard3.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI/jquery-ui.multidatespicker.js">
    </script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        $(function() {
            const today = new Date();
            const minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

            $("#departure_date").datepicker({
                dateFormat: "dd-mm-yy",
                minDate: minDate, // Disable past dates
                onClose: function(selectedDate) {
                    // Set the minimum date for return date
                    $("#return_date").datepicker("option", "minDate", selectedDate);
                }
            });
            $("#return_date").datepicker({
                dateFormat: "dd-mm-yy",
                minDate: minDate // Disable past dates
            });
        });
    </script>
    <script>
        $(function() {
            // Initialize the MultiDatesPicker
            $("#departure_dates").multiDatesPicker({
                dateFormat: "dd-mm-yy",
                minDate: 0, // Disable past dates
                //maxPicks: 5 // Limit the user to select up to 5 dates
            });
        });
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('lichtrinh');
        CKEDITOR.replace('chinhsach');
        CKEDITOR.replace('baogom');
        CKEDITOR.replace('khongbaogom');

        function validateForm() {
            // Ensure CKEditor updates textarea values
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            // Get values
            var lichtrinhValue = document.getElementById("lichtrinh").value.trim();
            var chinhsachValue = document.getElementById("chinhsach").value.trim();
            var baogomValue = document.getElementById("baogom").value.trim();
            var khongbaogomValue = document.getElementById("khongbaogom").value.trim();

            // Check if empty
            if (lichtrinhValue === "") {
                alert("Yêu cầu điền lịch trình.");
                return false;
            }
            if (chinhsachValue === "") {
                alert("Yêu cầu điền chính sách.");
                return false;
            }
            if (baogomValue === "") {
                alert("Yêu cầu điền bao gồm.");
                return false;
            }
            if (khongbaogomValue === "") {
                alert("Yêu cầu điền không bao gồm.");
                return false;
            }

            return true; // Allow form submission
        }
    </script>
    @yield('scripts')
</body>

</html>