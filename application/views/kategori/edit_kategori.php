<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul;?></h3>
        </div>

        <form method="post" action="<?= base_url()?>kategori/update" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Id Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_kategori" value="<?= $data['id_kategori'];?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kategori" value="<?= $data['nama_kategori'];?>" class="form-control" >
                    </div>
                </div>


                <div class="box-footer">
                    <a href="<?= base_url()?>kategori" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-Primary">Simpan</button>
                </div>
            
        </form>
     </div>

    </div>