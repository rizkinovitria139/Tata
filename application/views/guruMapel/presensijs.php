<script>
    $(document).ready(() => {
        console.log("asdas");
    });


    function doPresensi() {
        let presensiTable = document.getElementById("siswaPresensi");
        let presensiData = parseTable(presensiTable);
        console.log(presensiData);

        $.ajax({
            url: "<?= base_url("Tambah_presensi/inputPresensi") ?>",
            method: "POST",
            data: {
                presensiData
            },
            success: (data, status) => {
                if (data) {
                    window.location.replace("<?= base_url("Tambah_presensi") ?>");
                }
            }
        });
    }

    function showEditPresensi(nis) {
        $.ajax({
            url: "<?= base_url("Tambah_presensi/getPresensiSiswa/") ?>" + nis,
            success: (data, status) => {
                let presensiModal = document.getElementById("presensimodalcontent");
                presensiModal.innerHTML = data;
                setTimeout(() => {
                    $("#editPresensiModal").modal('toggle');
                }, 100);
            }
        });
    }

    function showEditPresensiAdmin(nis) {
        $.ajax({
            url: "<?= base_url("DataPresensi/getPresensiSiswa/") ?>" + nis,
            success: (data, status) => {
                let presensiModal = document.getElementById("presensimodalcontent");
                presensiModal.innerHTML = data;
                setTimeout(() => {
                    $("#editPresensiModal").modal('toggle');
                }, 100);
            }
        });
    }
</script>