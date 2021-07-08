<script>
    function submitNilai() {
        let nilaiTableView = document.getElementById('nilaiSiswa');
        let nilaiDatas = parseTable(nilaiTableView);

        $.ajax({
            url: "<?= base_url('Guru_Mapel/checkNilaiKelas') ?>",
            method: "POST",
            data: {
                'mapelid': nilaiDatas[0].id_mapel
            },
            success: (data) => {
                if (data === "1") {
                    this.sendNilai(nilaiDatas);
                } else {
                    alert('Anda sudah memasukan nilai kelas pada semester ini');
                }
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

    function editNilai() {
        let nilaiTableView = document.getElementById('nilaiSiswa');
        let nilaiDatas = parseTable(nilaiTableView);
        $.ajax({
            url: "<?= base_url('Guru_Mapel/submit_edit_nilai') ?>",
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