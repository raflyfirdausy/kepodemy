<section class="page-banner-section">
    <div class="container">
        <h1>Pembelian Saya</h1>
        <ul class="page-depth">
            <li><a href="<?= base_url() ?>"><?= $app_name ?></a></li>
            <li><a href="<?= current_url() ?>">Pembelian Saya</a></li>
        </ul>
    </div>
</section>

<section class="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Daftar
                    </div>
                    <div class="card-body table-responsive">
                        <table id="mytable" class="table table-striped table-bordered display responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 10%;">Kode Pembelian</th>
                                    <th>Produk</th>
                                    <th style="width: 15%;">Total</th>
                                    <th style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <?php $no = 1;
                                foreach ($transaksi as $tr) :
                                    $produk = "";
                                    $hargaTotal = 0;
                                    foreach ($tr["transaksidetail"] as $pr) :
                                        $hargaTotal += ($pr->harga - $pr->harga_diskon);
                                        $produk .= $pr->produk->nama . ", ";
                                    endforeach
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $tr["kode_transaksi"] ?></td>                                        
                                        <td><?= $produk ?></td>
                                        <td>Rp <?= Rupiah3($hargaTotal) ?></td>
                                        <td>aw</td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#mytable').DataTable({
            responsive: true
        });
    });
</script>