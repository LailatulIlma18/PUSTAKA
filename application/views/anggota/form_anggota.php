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

        <form method="post" action="<?= base_url()?>anggota/simpan" class="form-horizontal">
            <div class="box-body">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kode Anggota</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_anggota" value="<?= $kode_anggota;?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputemail3" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nis"  value="<?= set_value('nis'); ?>"  class="form-control" placeholder="Masukkan NIS">
						<?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                 </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Anggota</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_anggota" value="<?= set_value('nama_anggota'); ?>"  class="form-control" placeholder="Masukkan Nama Anggota" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="<?= set_value('email'); ?>"  class="form-control" placeholder="Masukkan Email Anda">
						 <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value=""> - Pilih Jenis Kelamin - </option>
                            <option value="Laki-laki" <?= set_select('jenis_kelamin','Laki-laki'); ?>>Laki-laki</option>
                            <option value="Perempuan" <?= set_select('jenis_kelamin','Perempuan'); ?>>Perempuan</option>
                        </select>
						<?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                    </div>
               </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea name="alamat" class="form-control" cols="30" rows="5"><?= set_value('alamat'); ?></textarea>
					 <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                    
            <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_telp"  value="<?= set_value('no_telp'); ?>"  class="form-control" placeholder="Masukkan Nomor Telepon Anda">
						 <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
            </div>

                <div class="box-footer">
                    <a href="<?= base_url()?>anggota" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
     </div>
    </div>
