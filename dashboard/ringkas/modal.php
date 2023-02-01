<div class="modal fade" id="exampleModal" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modalBaru">
        <div class="modal-content">
            <div class="modal-body bg-haha">
                <center>
                    <?php if($_SESSION['level']=='admin') { ?>
                    <img src="upload-petugas/<?php echo $_SESSION['gambar'] ?>" alt="" width="100px"
                        class="imgModal m-3">
                    <?php } else { ?>
                    <img src="upload-anggota/<?php echo $_SESSION['gambar'] ?>" alt="" width="100px"
                        class="imgModal m-3">
                    <?php } ?>
                </center>
                <p class="typo"><b><?php echo $_SESSION['nama_anggota']; ?></b></p>
                <p class="typo"><b><?php echo $_SESSION['jurusan_anggota']; ?></b></p>
                <p class="typo blockquote-footer">Anda Login Sebagai <b><?php echo $_SESSION['level']; ?></b></p>


            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row" style="padding: 10;">
                        <div class="col-md-5">
                            <a class="btn btn-primary btnModal " href="profile.php?id=<?php echo $_SESSION['id']; ?>"><i
                                    class="fa fa-user-circle-o" aria-hidden="true"></i>Profile</a>
                        </div>

                        <div class="col-md-2"></div>

                        <div class="col-md-5">
                            <a class="btn btn-danger" href="../page/logout.php"><i
                                    class="fa fa-sign-out me-1"></i>Keuar</a>
                        </div>
                    </div>
                </div>



            </div>


        </div>
    </div>
</div>