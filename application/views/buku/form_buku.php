<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $judul; ?></h3>
        </div>

        <!-- Pesan Error -->
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <!-- Pesan Sukses -->
        <?php if($this->session->flashdata('info')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('info'); ?></div>
        <?php endif; ?>

        <!-- Form Tambah Buku -->
        <form method="post" action="<?= base_url('buku/simpan') ?>" class="form-horizontal">
            <div class="box-body">
                <input type="hidden" name="id_buku" class="form-control" readonly>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_buku" value="<?= $kode_buku; ?>" class="form-control" readonly>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku" required>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                        <select name="id_kategori" id="kategoriSelect" class="form-control select2" required>
                            <option value=""> - Pilih Kategori - </option>
                            <?php foreach ($kategori as $row): ?>
                                <option value="<?= $row->id_kategori; ?>"><?= $row->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" class="btn btn-success btn-sm mt-2" 
                            data-toggle="modal" data-target="#modalKategori">+ Tambah Kategori</button>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" name="penulis" class="form-control" required>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" name="penerbit" class="form-control" required>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <select name="tahun_terbit" class="form-control select2" required>
                            <option value=""> - Pilih Tahun - </option>
                            <?php for ($tahun = 1850; $tahun <= date('Y')+1; $tahun++): ?>
                                <option value="<?= $tahun ?>"><?= $tahun; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" name="isbn" class="form-control" required>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                </div> 

                <div class="box-footer">
                    <a href="<?= base_url('buku') ?>" class="btn btn-warning">Cancel</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="modalKategoriLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalKategoriLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="formKategori" action="<?= base_url('kategori/simpan_ajax') ?>" method="post">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
          </div>
          <div id="kategoriError" class="text-danger" style="display:none;"></div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- CSS Tambahan -->
<style>
.select2-container { width: 100% !important; }
.mt-2 { margin-top: 10px; }
</style>

<!-- Script AJAX & Inisialisasi Select2 -->
<script>
$(document).ready(function() {
    // Inisialisasi Select2
    $('#kategoriSelect, select[name="tahun_terbit"]').select2({ width: '100%' });

    // Inisialisasi ulang jika modal muncul
    $('#modalKategori').on('shown.bs.modal', function() {
        $('#kategoriSelect').select2({ width: '100%' });
    });

    // AJAX tambah kategori
    $('#formKategori').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data){
                if(data.status === 'success'){
                    $('#kategoriSelect').append(`<option value="${data.id}" selected>${data.nama}</option>`).trigger('change');
                    $('#modalKategori').modal('hide');
                    $('#formKategori')[0].reset();
                    $('#kategoriError').hide();
                } else {
                    $('#kategoriError').text(data.message).show();
                }
            },
            error: function(){
                $('#kategoriError').text('Terjadi kesalahan server, coba lagi.').show();
            }
        });
    });
});
</script>
