<div class="container">
    <div>
        <h1>Konsultasi</h1>
        <p class="lead">Halaman konsultasi dengan siswa</p>
    </div>

    <div class="card bg-primary text-white my-2">
        <div class="card-body">
            <h5 class="card-title"><strong>Data forum</strong></h5>
            <p class="card-text m-0">Judul forum : <?= $forum->judul_forum ?></p>
            <p class="card-text m-0">Keterangan : <?= $forum->keterangan ?></p>
        </div>
    </div>


    <div id="chatbox-content">
        <?= $chat_page ? $chat_page : '' ?>
    </div>


</div>