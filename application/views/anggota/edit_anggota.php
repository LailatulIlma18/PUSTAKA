<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>
		
		 <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

		  <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url()?>anggota/update" class="form-horizontal">
            <div class="box-body">

                <input type="hidden" name="id_anggota" value="<?= $data['id_anggota']; ?>" class="form-control" >

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kode Anggota</label>
                    <div class="col-sm-10">
                        <input type="email" name="kode_anggota" value="<?= $data['kode_anggota'];?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputemail3" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nis" value="<?= $data['nis'];?>" class="form-control" placeholder="Masukkan NIS"  maxlength="10"
                        oninput="this.value = this.value.replace(/\D/g,'').slice(0,10);"> 
                    </div>
                 </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Anggota</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_anggota" value="<?= $data['nama_anggota'];?>" class="form-control" placeholder="Masukkan Nama Anggota" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="<?= $data['email'];?>" class="form-control" placeholder="Masukkan Email Anda" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control" required>
                            <?php 
                                if ($data ['jenis_kelamin'] == "laki-laki") {?>
                                    <option value="Laki-laki" selected> - Laki-laki - </option>
                                    <option value="Perempuan"> - Perempuan - </option>
                              <?php } else{ ?>
                                    <option value="Laki-laki"> - Laki-laki - </option>
                                    <option value="Perempuan" selected> - Perempuan - </option>
                             <?php }
                             ?>
                        </select>
                    </div>
               </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Anda" cols="30" rows="5" required><?= $data['alamat'];?></textarea>
                    </div>
                </div>
                    
            <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_telp" value="<?= $data['no_telp'];?>" class="form-control" placeholder="Masukkan Nomor Telepon Anda"  maxlength="12"
                          oninput="this.value = this.value.replace(/\D/g,'').slice(0,12);"> 
                    </div>
                </div>
            </div>

                <div class="box-footer">
                    <a href="<?= base_url()?>anggota" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
     </div>
    </div>
