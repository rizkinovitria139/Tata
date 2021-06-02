<script>
	// auto scroll to bottom chatbox
	$(document).ready(function() {
		var chatBox = document.getElementById("chatbox");
		chatBox.scrollTop = chatBox.scrollHeight;
	});

	function sendMessage(sender) {
		var message = document.getElementById('textMessage').value;
		var url = '<?= base_url('Konsultasi/sendMessage') ?>';
		var nip = '<?= $bkdata[0]['nip'] ?>';
		var nis = '<?= $this->session->userdata('nis') ?>'

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
			url: '<?= base_url('Konsultasi/getMessage') ?>',
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
				"nip": '<?= $bkdata[0]['nip'] ?>',
				"nis": '<?= $this->session->userdata('nis') ?>'
			},
			success: (data) => {
				window.location.reload('<?= base_url('Konsultasi/pesan') ?>');
			}
		});
	}

	updateChatSiswa();


	//	Kalau pengen auto refresh pakai ini, tetapi jika masih ada bug saat scroll pesan terkadang kembali kebawah sendiri
	// setInterval(() => {
	// 	updateChatSiswa();
	// }, 2000);
</script>