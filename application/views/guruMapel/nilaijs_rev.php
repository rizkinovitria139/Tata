<script>
    function submitNilai() {
        let nilaiTableView = document.getElementById('nilaiSiswa');
        let nilaiDatas = parseTable(nilaiTableView);

        $.ajax({
            success: (data) => {
                sendNilai(nilaiDatas);
            }
        });

    }

    function sendNilai(nilaiDatas) {
        $.ajax({
            url: "<?= base_url('Guru_Mapel/submit_nilai_rev') ?>",
            method: "POST",
            data: {
                'datanilai': nilaiDatas
            },
            success: (data) => {
                window.location.href = "<?= base_url('Guru_Mapel/nilai_rev') ?>";
            }
        });

    }
</script>