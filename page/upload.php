<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h4>Upload Gambar</h4>
                    <form action="?/url=upload" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Judul Foto</label>
                            <input type="text" class="form-control" required name="judul_foto" >
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Foto</label>
                            <textarea type="text" class="form-control" required cols="30" rows="5" name="deskripsi_foto"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Foto</label>
                            <input type="file" class="form-control" name="namafile" required accept=".jpg .png .gif">
                            <small class="text-danger">File Harus Berupa: *.jpg, *.png *.gif</small>
                        </div>
                        <input type="submit" value="simpan" name="submit" class="btn btn-danger my-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>