<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <form method="post" action="<?= base_url()?>buku/simpan" class="form-horizontal">
            <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_buku" value="<?= $id_buku;?>" class="form-control" readonly>
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku" required>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                        <select name="id_kategori" class="form-control select2">
                            <option value=""> - Pilih Kategori - </option>
                            <?php 
                                foreach ($kategori as  $row) {?>
                                <option value="<?= $row->id_kategori; ?>"><?= $row->nama_kategori; ?></option>
                               <?php }
                           ?>
                        </select>
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" name="penulis" class="form-control" >
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" class="form-control" >
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <select name="tahun_terbit" class="form-control select2">
                            <option value=""> - Pilih Tahun - </option>
                            <?php 
                                for ($tahun = 1850; $tahun<=2026; $tahun++) {?>
                                <option value="<?= $tahun?>"><?= $tahun;?></option>
                               <?php }
                           ?>
                        </select>
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" name="isbn" class="form-control" >
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah" class="form-control" >
                    </div>
                </div> 

                <div class="box-footer">
                    <a href="<?= base_url()?>buku" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-Primary">Simpan</button>
                </div>
            
        </form>
     </div>

    </div>