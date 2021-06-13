<script>
	// auto scroll to bottom chatbox

	function sendMessage(sender) {
		var message = document.getElementById('textMessage').value;
		var url = '<?= base_url('Konsultasi/sendMessage') ?>';
		var nip = '<?= $forum->nip_bk ?>';
		var nis = '<?= $forum->nis_siswa ?>';
		var idforum = '<?= $forum->id_forum ?>';

		$.ajax({
			url,
			data: {
				nip,
				nis,
				message,
				sender,
				idforum
			},
			type: "POST",
			success: function(data) {
				console.log(data);
				updateChatSiswa();
			},
		});
	}

	function updateChatSiswa() {
		$.ajax({
			url: '<?= strtolower($this->uri->segment(1))  === "konsultasi" ?  base_url('Konsultasi/getMessage/' . $bkdata[0]['nip']) : base_url('Konsultasi/getMessageBK/' . $siswaData->nis) ?>',
			success: (data) => {
				var chatboxContent = document.getElementById('chatbox-content').innerHTML;
				document.getElementById('chatbox-content').innerHTML = "";
				document.getElementById('chatbox-content').innerHTML = data;
				window.setInterval(() => {
					let divChats = document.getElementById('chatbox-content');
					divChats.scrollTop = divChats.scrollHeight;
				})
			}
		});
	}

	function clearChats() {
		$.ajax({
			url: '<?= base_url('Konsultasi/clearChats') ?>',
			method: "POST",
			data: {
				"nip": '<?= $forum->nip_bk ?>',
				"nis": '<?= $forum->nis_siswa ?>'
			},
			success: (data) => {
				window.location.reload('<?= $this->uri->segment(1) === "Konsultasi" ? base_url('Konsultasi/pesan') : base_url('Bk/konsultasi') ?>');
			}
		});
	}

	updateChatSiswa();


	//	Kalau pengen auto refresh pakai ini, tetapi jika masih ada bug saat scroll pesan terkadang kembali kebawah sendiri
	// setInterval(() => {
	// 	updateChatSiswa();
	// }, 2000);
</script>