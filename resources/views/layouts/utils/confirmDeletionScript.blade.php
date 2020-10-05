@push('customScripts')
<script>
    function confirmDeletion(event) {
        event.preventDefault();
        swal({
            title: 'Hapus data?',
            text: 'Data akan dihapus secara permanen dan tidak bisa dikembalikan.',
            buttons: ['Batal', 'Ya, lanjutkan'],
            icon: 'warning',
            dangerMode: true
        }).then(function(willDelete) {
            if (willDelete) event.target.form.submit();
        })
    }
</script>
@endpush