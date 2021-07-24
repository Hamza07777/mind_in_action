
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropzone/dropzone-script.js') }}"></script>
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>

<script src="{{ asset('assets/js/login.js') }}"></script>
<script src="{{ asset('assets/js/time-picker/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('assets/js/time-picker/highlight.min.js') }}"></script>
<script src="{{ asset('assets/js/time-picker/clockpicker.js') }}"></script>
<script src="{{ asset('assets/js/scrollable/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollable/scrollable-custom.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script src="{{ asset('assets/js/modal-animated.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/js/vector-map/map-vector.js') }}"></script>

<script type="text/javascript">

    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).style('display', 'none');
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
