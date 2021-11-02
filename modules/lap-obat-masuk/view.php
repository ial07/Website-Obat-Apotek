<!-- Aplikasi Persediaan Obat pada Apotek
*******************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 1 April 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-856-6991-9769
-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Persediaan metode FIFO

    <a class="btn btn-primary btn-social pull-right" href="cetak1.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a>
  </h1>

</section>
<br>
<div class="box box-primary">
  <div class="box-body">
    <!-- tampilan tabel Obat -->
    <table class="table table-bordered table-striped table-hover">
      <!-- tampilan tabel header -->
      <thead>
        <tr>
          <th class="center" rowspan="2">No.</th>
          <th class="center" rowspan="2">Kode</th>
          <th class="center" rowspan="2">Tanggal</th>
          <th class="center" rowspan="2">Kode Obat</th>
          <th class="center" rowspan="2">Nama Obat</th>
          <th class="center" colspan="3">Pemasukan</th>
          <th class="center" colspan="3">Pengeluaran</th>
          <th class="center" colspan="3">Persediaan</th>
        </tr>
        <tr>
          <th class="center">Jumlah Masuk</th>
          <th class="center">Harga/Unit [Rp]</th>
          <th class="center">Total [Rp]</th>
          <th class="center">Jumlah Keluar</th>
          <th class="center">Harga/Unit [Rp]</th>
          <th class="center">Total [Rp]</th>
          <th class="center">Stok</th>
          <th class="center">Harga/Unit [Rp]</th>
          <th class="center">Total [Rp]</th>
        </tr>
      </thead>
      <!-- tampilan tabel body -->
      <tbody>
        <?php
        $no = 1;
        // fungsi query untuk menampilkan data dari tabel obat
        $query = mysqli_query($mysqli, "SELECT * FROM is_fifo as a INNER JOIN is_obat as b ON a.kode_obat=b.kode_obat ORDER BY id ASC")
          or die('Ada kesalahan pada query tampil Data Obat Masuk: ' . mysqli_error($mysqli));

        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
          $tanggal         = $data['tanggal'];
          $exp             = explode('-', $tanggal);
          $tanggal_masuk   = $exp[2] . "-" . $exp[1] . "-" . $exp[0];

          if ($data['jumlah_masuk'] == 0) {
            $jm = "-";
          } else {
            $jm = $data['jumlah_masuk'];
          }

          if ($data['jumlah_masuk'] == 0) {
            $hb = "-";
          } else {
            $hb = number_format($data['harga_beli']);
          }

          if ($data['jumlah_masuk'] == 0) {
            $tb = "-";
          } else {
            $tb = number_format($data['harga_beli'] * $data['jumlah_masuk']);
          }

          if ($data['jumlah_keluar'] == 0) {
            $jj = "-";
          } else {
            $jj = $data['jumlah_keluar'];
          }

          if ($data['jumlah_keluar'] == 0) {
            $hj = "-";
          } else {
            $hj = number_format($data['harga_beli']);
          }

          if ($data['jumlah_keluar'] == 0) {
            $tj = "-";
          } else {
            $tj = number_format($data['harga_beli'] * $data['jumlah_keluar']);
          }
          // menampilkan isi tabel dari database ke tabel di aplikasi
          echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_transaksi]</td>
                      <td width='80' class='center'>$tanggal_masuk</td>
                      <td width='80' class='center'>$data[kode_obat]</td>
                      <td width='200' class='center'>$data[nama_obat]</td>
                      <td width='100' align='right'>$jm</td>
                      <td width='100' align='right'>$hb</td>
                      <td width='100' align='right'>$tb</td>
                      <td width='100' align='right'>$jj</td>
                      <td width='100' align='right'>$hj</td>
                      <td width='100' align='right'>$tj</td>
                      <td width='100' align='right'>$data[stok]</td>
                      <td width='100' align='right'>" . number_format($data['harga_beli']) . "</td>
                      <td width='100' align='right'>" . number_format($data['harga_beli'] * $data['stok']) . "</td>
                    </tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div><!-- /.box-body -->
</div><!-- /.box -->