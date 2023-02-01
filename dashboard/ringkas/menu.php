    <?php if($_SESSION['level'] == 'admin') {?>
    <div class="w3-row-padding text-center">
        <div class="w3-third w3-container w3-margin-bottom ">
            <img src="img/anggota.png" alt="anggota" style="width:150px;" class="w3-hover-opacity">
            <div class=" w3-container w3-white text-area">
                <p class="m-2"><b>Anggota</b></p>
                <button class="btn btn-outline-primary btn-sm m-2"><a href="anggota.php"> Daftar Anggota</a></button>
            </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
            <img src="img/buku.png" alt="buku" style="width:150px;" class="w3-hover-opacity">
            <div class=" w3-container w3-white">
                <p class="m-2"><b>Buku</b></p>
                <button class="btn btn-outline-warning btn-sm m-2"><a href="buku.php">Daftar Buku</a></button>
            </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
            <img src="img/petugas.png" alt="petugas" style="width: 150px;" class="w3-hover-opacity">
            <div class=" w3-container w3-white">
                <p class="m-2"><b>Petugas</b></p>
                <button class="btn btn-outline-info btn-sm m-2"><a href="petugas.php">Daftar Petugas</a></button>
            </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
            <img src="img/pinjam.png" alt="peminjaman" style="width:150px;" class="w3-hover-opacity">
            <div class=" w3-container w3-white">
                <p class="m-2"><b>Peminjaman</b></p>
                <button class="btn btn-outline-success btn-sm mt-2"><a href="pinjam.php">Peminjaman Buku</a></button>
            </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
            <img src="img/pengembalian-buku.png" alt="pengembalian" style="width:150px;" class="w3-hover-opacity">
            <div class=" w3-container w3-white">
                <p class="m-2"><b>Pengembalian</b></p>
                <button class="btn btn-outline-secondary btn-sm m-2"><a href="kembali.php">Pengembalian
                        Buku</a></button>
            </div>
        </div>
        <?php }else{ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="w3-third w3-container w3-margin-bottom">
                        <img src="img/buku.png" alt="pengembalian" class="w3-hover-opacity user">
                        <div class=" w3-container w3-white">
                            <button class="btn btn-outline-warning btn-sm mt-4 button merah"><a href="buku.php">Daftar
                                    Buku</a></button>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="w3-third w3-container w3-margin-bottom">
                        <img src="img/pinjam.png" alt="peminjaman" class="w3-hover-opacity user">
                        <div class=" w3-container w3-white">
                            <button class="btn btn-outline-warning btn-sm mt-4 button kuning"><a
                                    href="pinjam_buku.php">Peminjaman
                                    Buku</a></button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="w3-third w3-container w3-margin-bottom">
                        <img src="img/pengembalian-buku.png" alt="pengembalian" class="w3-hover-opacity user">
                        <div class=" w3-container w3-white">
                            <button class="btn btn-outline-warning btn-sm mt-4 button hijau"><a
                                    href="pinjam.php">Pengembalian
                                    Buku</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php } ?>