<script>
    $(document).ready(() => {
        console.log("asdas");
    });

    const doPresensi = async () => {
        const presensiTable = document.getElementById("siswaPresensi");
        const tanggalpresensi = document.getElementById("tanggalinput").value;
        const presensiData = await parseTable(presensiTable);

        if (tanggalpresensi === '') {
            alert("Mohon untuk mengisi tanggal terlebih dahulu. ");
        } else {
            let postData = {
                presensiData: presensiData,
                tanggalpresensi: tanggalpresensi        
            };
            console.log(presensiData[0]);
            await $.ajax({
                url : "<?= base_url("Tambah_presensi/inputPresensi")?>",
                method: "POST",
                data: postData,
                success: (data, status) => {
                    if (data) {
                        window.location.replace("<?= base_url("Tambah_presensi") ?>");
                    }
                }
            });
            // $.ajax({
            //     url: '<?= base_url("Tambah_presensi/inputPresensi") ?>',
            //     method: "POST",
            //     data: {
            //         "presensiData": presensiData,
            //         "tanggalpresensi": tanggalpresensi
            //     },
            //     success: (data, status) => {
            //         // if (data) {
            //         //     window.location.replace("<?= base_url("Tambah_presensi") ?>");
            //         // }
                    // console.log(data);
            //     }
            // });
        }
    }

    // function doPresensi() {
    //     const presensiTable = document.getElementById("siswaPresensi");
    //     const tanggalpresensi = document.getElementById("tanggalinput").value;
    //     const presensiData = parseTable(presensiTable);

    //     if (tanggalpresensi === '') {
    //         alert("Mohon untuk mengisi tanggal terlebih dahulu. ");
    //     } else {
    //         let postData = {
    //             presensiData: presensiData,
    //             tanggalpresensi: tanggalpresensi        
    //         };
    //         console.log(presensiData[0]);
    //         $.ajax({
    //             url : "<?= base_url("Tambah_presensi/inputPresensi")?>",
    //             method: "POST",
    //             data: {'data' : tanggalpresensi,},
    //         });
    //         // $.ajax({
    //         //     url: '<?= base_url("Tambah_presensi/inputPresensi") ?>',
    //         //     method: "POST",
    //         //     data: {
    //         //         "presensiData": presensiData,
    //         //         "tanggalpresensi": tanggalpresensi
    //         //     },
    //         //     success: (data, status) => {
    //         //         // if (data) {
    //         //         //     window.location.replace("<?= base_url("Tambah_presensi") ?>");
    //         //         // }
    //         //         console.log(data);
    //         //     }
    //         // });
    //     }

    // }

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