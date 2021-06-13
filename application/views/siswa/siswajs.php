<script>
    function startForum() {

        $.ajax({
            url: `<?= base_url("Konsultasi/showForumForm") ?>/`,
            success: (data) => {
                let divModal = document.getElementById("modalforum");
                divModal.innerHTML = data;
                setTimeout(() => {
                    $("#modalOpenForum").modal('toggle');
                }, 100);
            }
        });
    }
</script>