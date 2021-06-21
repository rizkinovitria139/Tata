<script>
    function submitNilai() {
        let nilaiTableView = document.getElementById('nilaiSiswa');
        let nilaiDatas = parseTable(nilaiTableView);
        let semesterSelect = document.getElementById("semesterSelect").value;

        $.ajax({
            url: "<?= base_url('Guru_Mapel/checkSemesterNilai') ?>",
            method: "POST",
            data: {
                'datanilai': nilaiDatas,
                'semesternilai': semesterSelect
            },
            success: (data) => {

                // console.log(Boolean(data));
                if (Boolean(data)) {
                    alert(`Mohon maaf, anda sudah masukan nilai pada kelas ini pada ${$('#semesterSelect>option:selected').text()}, Periksa kembali apakah semester nilai yang anda kirimkan `);
                } else {
                    sendNilai(nilaiDatas, semesterSelect);
                }
            }
        });

    }

    function sendNilai(nilaiDatas, semesterSelect) {
        $.ajax({
            url: "<?= base_url('Guru_Mapel/submit_nilai') ?>",
            method: "POST",
            data: {
                'datanilai': nilaiDatas,
                'semesternilai': semesterSelect
            },
            success: (data) => {
                window.location.href = "<?= base_url('Guru_Mapel/nilai') ?>";
            }
        });
    }
</script>