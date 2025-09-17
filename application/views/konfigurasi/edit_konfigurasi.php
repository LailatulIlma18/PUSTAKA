<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <form method="post" action="<?= base_url()?>konfigurasi/update" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Denda</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_denda" value="<?= $data['id_denda'];?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Denda</label>
                    <div class="col-sm-10">
                        <input type="text" name="jenis" value="<?= $data['jenis'];?>" class="form-control" >
                    </div>
                </div>

				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Perhari</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_per_hari" value="<?= $data['denda_per_hari'];?>" class="form-control" >
                    </div>
                </div>

				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Perbulan</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_per_bulan" value="<?= $data['denda_per_bulan'];?>" class="form-control" >
                    </div>
                </div>

				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Pertahun</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_per_tahun" value="<?= $data['denda_per_tahun'];?>" class="form-control" >
                    </div>
                </div>

				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Ringan</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_ringan" value="<?= $data['denda_ringan'];?>" class="form-control" >
                    </div>
                </div>


			 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Berat</label>
                    <div class="col-sm-10">
                        <input type="text" name="denda_berat" value="<?= $data['denda_berat'];?>" class="form-control" >
                    </div>
                </div>

				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Denda Hilang</label>
                    <div class="col-sm-10">
                        <input type="text" name="hilang" value="<?= $data['hilang'];?>" class="form-control" >
                    </div>
                </div>


                <div class="box-footer">
                    <a href="<?= base_url()?>konfigurasi" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            
        </form>
     </div>

    </div>
