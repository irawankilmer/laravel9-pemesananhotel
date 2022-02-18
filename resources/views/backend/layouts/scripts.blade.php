<!-- jQuery -->
<script src="{{asset('src/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Sweetalert 2 -->
<script src="{{asset('src/sweetalert2/sweetalert2.min.js')}}"></script>
@stack('scripts')
<!-- AdminLTE App -->
<script src="{{asset('src/js/adminlte.min.js')}}"></script>
<script>
    @if (session()->has('success'))
      Swal.fire({
        icon: 'success',
        title: "{{ session('success') }}"
      })
    @endif
</script>