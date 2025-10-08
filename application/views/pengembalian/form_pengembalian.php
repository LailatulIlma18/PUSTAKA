<tr>
    <td>Hari Terlambat</td>
    <td><input type="text" class="form-control" value="<?= $hari_terlambat; ?> Hari" readonly></td>
</tr>
<tr>
    <td>Denda Perhari</td>
    <td><input type="text" class="form-control" value="Rp <?= number_format($total_denda_harian, 0, ',', '.'); ?>" readonly></td>
</tr>
<tr>
    <td>Denda Perbulan</td>
    <td><input type="text" class="form-control" value="Rp <?= number_format($total_denda_bulanan, 0, ',', '.'); ?>" readonly></td>
</tr>
<tr>
    <td>Denda Pertahun</td>
    <td><input type="text" class="form-control" value="Rp <?= number_format($total_denda_tahunan, 0, ',', '.'); ?>" readonly></td>
</tr>
