<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <form method="post" action="<?= base_url()?>buku/update" class="form-horizontal">
            <div class="box-body">
                  <!-- <div class="form-group"> -->
                    <!-- <label for="inputEmail3" class="col-sm-2 control-label">Id Buku</label> -->
                    <!-- <div class="col-sm-10"> -->
                        <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>" class="form-control" >
                    <!-- </div> -->
                <!-- </div>  -->

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_buku" value="<?= $data['kode_buku'];?>" class="form-control" readonly>
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" value="<?= $data['judul'];?>" class="form-control" required>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                        <select name="id_kategori" class="form-control select2">
                            <?php 
                            foreach ($kategori as $row) {
                                if ($data['id_kategori'] == $row->id_kategori) {?>
                                     <option value="<?= $row->id_kategori;?>" selected><?= $row->nama_kategori;?></option>       
                              <?php }else{?>
                                     <option value="<?= $row->id_kategori;?>"><?= $row->nama_kategori;?></option>       
                             <?php }
                            }
                            
                            ?>
                        </select>
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" name="penulis" value="<?= $data['penulis'];?>" class="form-control" >
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" value="<?= $data['penerbit'];?>" class="form-control" >
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <select name="tahun_terbit" class="form-control select2">
                            <option value=""> - Pilih Tahun - </option>
                            <?php 
                                for ($tahun = 1850; $tahun<=2026; $tahun++) {
                                    if ($data['tahun_terbit'] == $tahun) {?>
                                        <option value="<?= $tahun;?>" selected><?= $tahun;?></option>
                                    <?php } else { ?>
                                        <option value="<?= $tahun;?>"><?= $tahun;?></option>
                                    <?php }
                                }
                           ?>
                        </select>
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" name="isbn"  value="<?= $data['isbn'];?>" class="form-control" >
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah"  value="<?= $data['jumlah'];?>" class="form-control" >
                    </div>
                </div> 

                <div class="box-footer">
                    <a href="<?= base_url()?>buku" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-Primary">update</button>
                </div>
            
        </form>
     </div>

    </div>