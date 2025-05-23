@if (Session::has('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
<script type="text/javascript">
    var msg = '{{ session('success') }}';
    swal({
        text: msg,
        title: 'Merci',
        type: 'success',
        toastr: true,
        timer: 3000,
        showConfirmButton: false
    })
</script>
@endif
@if (Session::has('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
<script type="text/javascript">
    var msg = '{{ session('error') }}';
    swal({
        text: msg,
        title: 'réessayer SVP',
        type: 'warning',
        toastr: true,
        timer: 3000,
        showConfirmButton: false
    })
    //     swal(
    //     '',
    //     msg,
    //     'warning'
    //   )
</script>
@endif
@if (Session::has('warning'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
<script type="text/javascript">
    var msg = '{{ session('warning') }}';
    swal(
        msg,
        'réessayer SVP',
        'danger'
    )
</script>
@endif
