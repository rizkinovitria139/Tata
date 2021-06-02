<script>
	// auto scroll to bottom chatbox
	$(document).ready(function() {
		var chatBox = document.getElementById("chatbox");
		chatBox.scrollTop = chatBox.scrollHeight;

	});


	function sendMessage(sender) {
		var message = document.getElementById('textMessage').value;
		var url = '<?= base_url('Konsultasi/sendMessage') ?>';
		var nip = '<?= $this->uri->segment(1) === 'Konsultasi' ? $bkdata[0]['nip'] : $this->session->userdata('nip') ?>';
		var nis = '<?= $this->uri->segment(1) === 'Konsultasi' ? $this->session->userdata('nis') : $siswaData->nis ?>';

		$.ajax({
			url,
			data: {
				nip,
				nis,
				message,
				sender,
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
			url: '<?= $this->uri->segment(1) === "Konsultasi" ? base_url('Konsultasi/getMessage') : base_url('Konsultasi/getMessageBK') ?>',
			success: (data) => {
				var chatboxContent = document.getElementById('chatbox-content').innerHTML;
				document.getElementById('chatbox-content').innerHTML = "";
				document.getElementById('chatbox-content').innerHTML = data;

			}
		});
	}

	function clearChats() {
		$.ajax({
			url: '<?= base_url('Konsultasi/clearChats') ?>',
			method: "POST",
			data: {
				"nip": '<?= $this->uri->segment(1) === 'Konsultasi' ? $bkdata[0]['nip'] : $this->session->userdata('nip') ?>',
				"nis": '<?= $this->uri->segment(1) === 'Konsultasi' ? $this->session->userdata('nis') : $siswaData->nis ?>'
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