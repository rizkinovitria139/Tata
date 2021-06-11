<script>
    $(document).ready(() => {
        console.log("asdas");
    });


    function doPresensi() {
        let presensiTable = document.getElementById("siswaPresensi");
        let tanggalpresensi = document.getElementById("tanggalinput").value;
        let presensiData = parseTable(presensiTable);

        if (tanggalpresensi === '') {
            alert("Mohon untuk mengisi tanggal terlebih dahulu. ");
        } else {
            console.log("asd");
            $.ajax({
                url: "<?= base_url("Tambah_presensi/inputPresensi") ?>",
                method: "POST",
                data: {
                    presensiData,
                    tanggalpresensi
                },
                success: (data, status) => {
                    if (data) {
                        window.location.replace("<?= base_url("Tambah_presensi") ?>");
                    }
                }
            });
        }

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

    function editHarianPresensi(id) {
        $("#editPresensiModal").modal('hide');
        $.ajax({
            url: "<?= base_url("Tambah_presensi/getHarianSiswa/") ?>" + id,
            success: (data, status) => {
                let presensiModal = document.getElementById("presensimodalcontent");
                presensiModal.innerHTML = data;
                setTimeout(() => {
                    $("#editPresensiModal").modal('toggle');
                }, 1000);
            }
        });
    }

    function editHarianPresensiAdmin(id) {
        $("#editPresensiModal").modal('hide');
        $.ajax({
            url: "<?= base_url("DataPresensi/getHarianSiswa/") ?>" + id,
            success: (data, status) => {
                let presensiModal = document.getElementById("presensimodalcontent");
                presensiModal.innerHTML = data;
                setTimeout(() => {
                    $("#editPresensiModal").modal('toggle');
                }, 1000);
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