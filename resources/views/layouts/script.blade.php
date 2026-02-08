

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('dashboard_assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('dashboard_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('dashboard_assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('dashboard_assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('dashboard_assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('dashboard_assets/js/demo/chart-pie-demo.js') }}"></script>

<!-- Page level plugins -->
<script src="{{asset('dashboard_assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard_assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard_assets/js/demo/datatables-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(".btn-close").on("click", function(){
        $("#tambah-data-modal").modal("hide");
        $("#edit-data-modal").modal("hide");
        $("#detail-data-modal").modal("hide");
    })
</script>
@yield('own_scripts')