<script>
    function changeForum(idForum) {
        $.ajax({
            url: `<?= base_url('bk/changestatus/') ?>${idForum}`,
            success: (data) => {
                window.location.reload('<?= base_url('Bk/konsultasi') ?>');
            }
        })
    }
</script>