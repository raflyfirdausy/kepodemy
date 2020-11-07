<section class="page-banner-section">
    <div class="container">
        <h1>Detail Pembelian</h1>
        <ul class="page-depth">
            <li><a href="<?= base_url() ?>"><?= $app_name ?></a></li>
            <li><a href="<?= current_url() ?>">Detail Pembelian</a></li>
        </ul>
    </div>
</section>

<section class="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if ($this->session->flashdata("gagal")) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $this->session->flashdata("gagal") ?>.
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata("sukses")) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $this->session->flashdata("sukses") ?>.
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        Upload Bukti Pembayaran
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-md-7">
                                <table>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Kode Transaksi</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <code><?= $data["kode_transaksi"] ?></code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Waktu Pembelian</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <code><?= longdate_indo($data["created_at"], TRUE) ?></code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Jumlah Produk</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <code><?= sizeof($data["transaksidetail"]) ?> Produk</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Total Bayar</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $total = 0;
                                            foreach ($data["transaksidetail"] as $dt) {
                                                $total += ($dt->harga - $dt->harga_diskon);
                                            }
                                            ?>
                                            <code>Rp <?= Rupiah3($total) ?></code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Catatan</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <code><?= $data["keterangan"] ?></code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Bukti Pembayaran</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <code class="ml-1">
                                                <?php if ($data["bukti_bayar"] != NULL) : ?>
                                                    <a href="<?= asset("bukti/") ?>" target="_blank" rel="noopener noreferrer">
                                                        Lihat Bukti Pembayaran
                                                    </a>
                                                <?php else : ?>
                                                    <a href="javascript:void(0)" rel="noopener noreferrer">
                                                        Belum upload bukti pembayaran
                                                    </a>
                                                <?php endif ?>
                                            </code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Status</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $status_bayar = $data["status_bayar"];
                                            if ($status_bayar == 1) {
                                                $status = "Pembayaran sudah di konfirmasi";
                                            } else if ($status_bayar == 2) {
                                                $status = "Menunggu konfirmasi admin";
                                            } else {
                                                $status = "Pembelian di tolak . (" . $data["keterangan"] . ")";
                                            }
                                            ?>
                                            <code><?= $status ?></code>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <span class="card-text">
                                        Upload Bukti Pembayaran
                                    </span>
                                    <form action="http://www.bakaranproject.com/daftar_event/upload_bukti" method="post" enctype="multipart/form-data">
                                        <div class="form-control">
                                            <input required accept="image/png, image/jpeg, image/jpg" type="file" class="form-input" name="bukti_pembayaran" />
                                            <input type="hidden" name="kode" value="<?= $data["kode_transaksi"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <small><code>Type : .jpeg .jpg .png | Max Size : 3 MB </code></small>
                                            <button type="submit" class="btn col-md-12 btn-info p-2">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        Info Pembayaran
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-body">
                                <span class="card-text">Silahkan Lakukan pembayaran dengan metode pembayaran yang kami sediakan.</span>
                                <table>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-bold">Metode Pembayaran</p>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-normal">Transfer Bank</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <code>BRI 12345-56-7891011-12-1 (a.n KEPODEMY)</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                        </td>
                                        <td></td>
                                        <td>
                                            <code>BNI 0123456789 (a.n KEPODEMY)</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-3">
                                            <p class="card-text mb-0 font-weight-normal">KonfirmasiT ransfer</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <code>Whatsapp +6285726096515 (Rafli Firdausy Irawan)</code>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Produk
                    </div>
                    <div class="card-body">
                        <table class="table mt-2">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama Produk</th>
                            </tr>
                            <?php $no = 1;
                            foreach ($data["transaksidetail"] as $tr) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?= $tr->produk->nama ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>