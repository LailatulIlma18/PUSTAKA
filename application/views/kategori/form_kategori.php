<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <form method="post" action="<?= base_url()?>kategori/simpan" class="form-horizontal">
            <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan Kategori" required>
                    </div>
                </div> 

                <!-- <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Buku</label>
                    <div class="col-sm-10">
                        <select name="nama_kategori" class="form-control" required>
                            <option value=""> - Pilih Kategori Buku - </option>
                            <option value="romance"> - Romance - </option>
                            <option value="action"> - action - </option>
                        </select>
                    </div>
               </div> -->

                <div class="box-footer">
                    <a href="<?= base_url()?>kategori" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-Primary">Simpan</button>
                </div>
            
        </form>
     </div>

    </div>