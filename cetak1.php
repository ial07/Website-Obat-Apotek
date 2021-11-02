<?php include('config/database.php') ?>

<body onLoad="javascript:window:print()">
    <link href="ui/css/cerulean.min.css" rel="stylesheet">
    <div align="center"><strong><b>SISTEM INFORMASI PERSEDIAAN OBAT PUSKESMAS</strong><br />
        <div align="center"><strong><b>INDUK PANINJAUAN KECAMATAN X KOTO DIATAS</strong><br />
            <div align="center"><strong><b>KABUPATEN SOLOK</strong><br />
                <div align="center"><strong><b>________________________________________________________________________________________________________________________________________________________________________________</strong><br />
                    <div align="left">
                        <font size="2">HAL : Laporan Persediaan Obat Metode FIFO</font></strong><br />
                    </div>
                    <p>
                    </p>
                </div>
                <div class="panel-body">
                    <center>
                        <table border="1" class="table table-bordered">
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
                    </center>
                </div>
                <p></p>
                <br>
                <br>

                <div style="width:200px;float:right">
                    <div style="text-align:left">
                        Kota Solok, <?php echo date("d-M-Y") ?>
                        <br />&emsp;Kepala Puskesmas
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>&emsp;&emsp;&emsp;Filmadona<br /></p>
                    </div>
                </div>

            </div>


            <!-- <script>
            var randomScalingFactor = function() {
                return Math.round(Math.random() * 100)
            };

            var barChartData = {
                labels: [
                    <?php
                    for ($i = 0; $i < $a; $i++) {
                        echo '"' . $alt_name[$i] . '",';
                    }
                    ?>
                ],
                datasets: [{
                        fillColor: "rgba(0,0,255,0.75)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(0,128,255,0.75)",
                        highlightStroke: "rgba(220,220,220,1)",
                        data: [
                            <?php
                            for ($i = 0; $i < $a; $i++) {
                                echo $v[$i] . ',';
                            }
                            ?>
                        ]
                    },
                    /*{
                    	fillColor : "rgba(151,187,205,0.5)",
                    	strokeColor : "rgba(151,187,205,0.8)",
                    	highlightFill : "rgba(151,187,205,0.75)",
                    	highlightStroke : "rgba(151,187,205,1)",
                    	data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                    }*/
                ]

            }
            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData, {
                    responsive: true
                });
            }
        </script> -->

        </div>
</body>