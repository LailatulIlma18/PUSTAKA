<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <form method="post" action="<?= base_url()?>konfigurasi/simpan" class="form-horizontal">
            <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Denda</label>
                    <div class="col-sm-10">
                        <input type="text" name="jenis" class="form-control">
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Perhari</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_per_hari" class="form-control">
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Perbulan</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_per_bulan" class="form-control">
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Pertahun</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_per_tahun" class="form-control">
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Rusak Ringan</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_ringan" class="form-control">
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Rusak Berat</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_berat" class="form-control">
                    </div>
                </div> 

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Hilang</label>
                    <div class="col-sm-10">
                        <input type="text" name="hilang" class="form-control">
                    </div>
                </div> 

                <div class="box-footer">
                    <a href="<?= base_url()?>konfigurasi" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            
        </form>
     </div>

    </div>
