<div class="bg-white rounded">
    <div class="bg-primary text-white p-3">
        <div class="d-flex">
            <div>
                <h5><?= $bkdata[0]['nama'] ?></h5>
                <p class="m-0"><?= $bkdata[0]['nip'] ?></p>
            </div>
            <?php if ($this->session->userdata('nip') != null) { ?>
                <div class="ml-auto d-flex align-items-center">
                    <button onclick="clearChats()" class="btn btn-sm btn-danger">Clear Chat</button>
                </div>
            <?php } ?>

        </div>
    </div>
    <div style="overflow-y: scroll; height: 25rem;" id="chatbox" class="bg-white">
        <?php foreach ($message as $key => $value) { ?>
            <div class="text-dark my-4 mx-5 w-50 <?= $value['isSender'] === 'siswa' ? 'float-right' : 'float-left' ?>">
                <p class="m-0 font-weight-bold <?= $value['isSender'] === 'siswa' ? 'text-right' : 'text-left' ?>"><?= $value['isSender'] === 'siswa' ? $value['namasiswa'] : $value['namaguru'] ?></p>
                <div class="<?= $value['isSender'] === 'siswa' ? 'bg-primary text-light' : 'bg-warning text-dark' ?> p-2 rounded">
                    <p><?= $value['message'] ?></p>
                    <p class="m-0 font-weight-light text-right"><small><?= $value['createdAt'] ?></small></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="input-group mb-3">
        <textarea class="form-control" id="textMessage" placeholder="Isi pesan" aria-label="Pesan" name="pesan"></textarea>
        <div class="input-group-append">
            <button class="btn btn-primary" id="sendMessagebtn" onclick="sendMessage('siswa')" type="button">Kirim</button>
        </div>
    </div>

</div>