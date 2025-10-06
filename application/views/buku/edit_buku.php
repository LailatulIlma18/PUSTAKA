<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <?php
			if($this->session->flashdata('error')): ?>
            <div
			 class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
            </div>
            <?php  endif; ?>

           <?php 
		   if($this->session->flashdata('info')): ?>
          <div class="alert alert-success">
          <?= $this->session->flashdata('info'); ?>
          </div>
         <?php endif; ?>

        <form method="post" action="<?= base_url()?>buku/update" class="form-horizontal">
            <div class="box-body">
                        <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>" class="form-control" >

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_buku" value="<?= $data['kode_buku'];?>" class="form-control" readonly>
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" value="<?= $data['judul'];?>" class="form-control"  placeholder="Masukkan Judul Buku">
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                        <select name="id_kategori" class="form-control select2"  placeholder="Masukkan Kategori Buku">
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
                        <input type="text" name="penulis" value="<?= $data['penulis'];?>" class="form-control" placeholder="Masukkan Penulis Buku">
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" value="<?= $data['penerbit'];?>" class="form-control" placeholder="Masukkan Penerbit Buku">
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <select name="tahun_terbit" class="form-control select2"  placeholder="Masukkan Tahun Terbit">
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
                        <input type="text" name="isbn"  value="<?= $data['isbn'];?>" class="form-control"  placeholder="Masukkan ISBN" maxlength="13"
                          oninput="this.value = this.value.replace(/\D/g,'').slice(0,13);">
                    </div>
                </div> 

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah"  value="<?= $data['jumlah'];?>" class="form-control" placeholder="Masukkan Jumlah Buku">
                    </div>
                </div> 

                <div class="box-footer">
                    <a href="<?= base_url()?>buku" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            
        </form>
     </div>

    </div>
