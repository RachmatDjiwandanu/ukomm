<?php include './koneksi.php';?>
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h4>Album Gambar</h4>
                    <!-- ambil data yang dikirim oleh form -->
                    <?php
                        $submit=@$_POST['submit'];
                        if ($submit=='simpan') {
                            # code...
                            $nama_album=@$_POST['nama_album'];
                            $deskripsi=@$_POST['deskripsi'];
                            $tanggal=date('Y-m-d');
                            $id_user=@$_SESSION['user_id'];
                            $insert = mysqli_query($conn, "INSERT INTO album VALUES('', '$nama_album', '$deskripsi', '$tanggal', '$id_user')");

                            if ($insert) {
                                echo 'Berhasil Membuat Album';
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                            } else {
                                echo 'Gagal Membuat Album: ' . mysqli_error($conn);
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                            }
                        }                            
                    ?>
                    <form action="?url=album" method="post">
                        <div class="form-group">
                            <label>Judul Album</label>
                            <input type="text" class="form-control" required name="nama_album" >
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Album</label>
                            <textarea class="form-control" required cols="30" rows="5" name="deskripsi"></textarea>
                        </div>
                        <input type="submit" value="simpan" name="submit" class="btn btn-danger my-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

